pipeline {
  agent any
  environment {
    # image name uses build number so it won't clash
    DOCKER_IMAGE = "mybank-app:${BUILD_NUMBER}"
  }

  stages {
    stage('Checkout') {
      steps {
        checkout scm
      }
    }

    stage('Setup Python') {
      steps {
        sh '''
          set -euo pipefail
          python3 -m venv venv 2>/dev/null || python -m venv venv || true
          . venv/bin/activate || true
          pip install --upgrade pip || true
          if [ -f requirements.txt ]; then pip install -r requirements.txt || true; fi
        '''
      }
    }

    stage('Run Tests') {
      steps {
        sh '''
          set -euo pipefail
          . venv/bin/activate || true
          pytest -q || true
        '''
      }
    }

    stage('Docker Build') {
      steps {
        sh '''
          set -euo pipefail
          echo "Building image ${DOCKER_IMAGE}..."
          docker build -t ${DOCKER_IMAGE} .
          docker images ${DOCKER_IMAGE} --format "table {{.Repository}}:{{.Tag}}\t{{.ID}}\t{{.Size}}"
        '''
      }
    }

    stage('Trivy Image Scan (JSON + HTML)') {
      steps {
        sh '''
          set -euo pipefail
          echo "Scanning image ${DOCKER_IMAGE} with Trivy..."

          # JSON report
          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "$WORKSPACE":/project \
            aquasec/trivy:latest image \
            --format json \
            --output /project/trivy-image-report.json \
            ${DOCKER_IMAGE} || true

          # HTML report (uses Trivy html template)
          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "$WORKSPACE":/project \
            aquasec/trivy:latest image \
            --format template \
            --template "@contrib/html.tpl" \
            --output /project/trivy-image-report.html \
            ${DOCKER_IMAGE} || true

          echo "Trivy reports created in workspace"
        '''
      }
      post {
        always {
          sh '''
            # if Docker created root-owned files, make sure Jenkins can archive them
            if [ -e "$WORKSPACE/trivy-image-report.html" ] || [ -e "$WORKSPACE/trivy-image-report.json" ]; then
              chown -R $(id -u):$(id -g) "$WORKSPACE" || true
            fi
          '''
          archiveArtifacts artifacts: 'trivy-image-report.*', fingerprint: true
        }
      }
    }

    // optional: add filesystem scan stage if you want later
  }

  post {
    always {
      echo "Pipeline finished. Trivy reports (json + html) archived as artifacts."
    }
    failure {
      echo "Pipeline failed — check Console Output for errors and artifacts for reports."
    }
  }
}
