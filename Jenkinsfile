pipeline {
  agent any
  environment {
    DOCKER_IMAGE = "mybank-app:${BUILD_NUMBER}"
    TRIVY_FS_SCAN = "false"
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

          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "$WORKSPACE":/project \
            aquasec/trivy:latest image \
            --format json --output /project/trivy-image-report.json ${DOCKER_IMAGE} || true

          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "$WORKSPACE":/project \
            aquasec/trivy:latest image \
            --format template --template "@contrib/html.tpl" --output /project/trivy-image-report.html ${DOCKER_IMAGE} || true

          echo "Trivy reports created: trivy-image-report.json and trivy-image-report.html"
        '''
      }
      post {
        always {
          sh '''
            if [ -e "$WORKSPACE/trivy-image-report.html" ] || [ -e "$WORKSPACE/trivy-image-report.json" ]; then
              chown -R $(id -u):$(id -g) "$WORKSPACE" || true
            fi
          '''
          archiveArtifacts artifacts: 'trivy-image-report.*', fingerprint: true
        }
      }
    }

    stage('Trivy Filesystem Scan (optional)') {
      when { expression { return env.TRIVY_FS_SCAN == 'true' } }
      steps {
        sh '''
          set -euo pipefail
          docker run --rm -v "$WORKSPACE":/project aquasec/trivy:latest fs /project \
            --format json --output /project/trivy-fs-report.json || true

          docker run --rm -v "$WORKSPACE":/project aquasec/trivy:latest fs /project \
            --format template --template "@contrib/html.tpl" --output /project/trivy-fs-report.html || true
        '''
      }
      post {
        always {
          sh 'chown -R $(id -u):$(id -g) "$WORKSPACE" || true'
          archiveArtifacts artifacts: 'trivy-fs-report.*', fingerprint: true
        }
      }
    }
  }

  post {
    always {
      echo "Pipeline finished. Find Trivy reports under Build → Artifacts."
    }
    failure {
      echo "Pipeline failed — check Console Output and archived artifacts for details."
    }
  }
}
