pipeline {
  agent any

  environment {
    IMAGE_NAME = "myapp:latest"                     // change to the image you want to scan
    REPORT_DIR  = "trivy-reports"
    TEMPLATE_PATH = "/var/lib/jenkins/trivy-html.tpl"
  }

  stages {
    stage('Prepare') {
      steps {
        sh '''
          set -ex
          mkdir -p ${REPORT_DIR}
          echo "Working dir: $(pwd)"
          echo "Template file listing:"
          ls -l ${TEMPLATE_PATH} || true
        '''
      }
    }

    stage('(Optional) Build Docker Image') {
      steps {
        // remove this stage if you already have the image remotely
        sh '''
          set -ex
          # build your image if needed
          if [ -f Dockerfile ]; then
            docker build -t ${IMAGE_NAME} .
          else
            echo "No Dockerfile found in workspace; skipping docker build."
          fi
        '''
      }
    }

    stage('Trivy scan using Trivy docker image') {
      steps {
        sh '''
          set -ex

          # Pull latest trivy container
          docker pull aquasecurity/trivy:latest || true

          # Use dockerized trivy, mount docker socket so it can scan local images
          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "${PWD}/${REPORT_DIR}":/reports \
            -v "${TEMPLATE_PATH}":/templates/html.tpl:ro \
            aquasecurity/trivy:latest image --format json -o /reports/trivy-report.json ${IMAGE_NAME}

          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "${PWD}/${REPORT_DIR}":/reports \
            -v "${TEMPLATE_PATH}":/templates/html.tpl:ro \
            aquasecurity/trivy:latest image --format template --template @/templates/html.tpl -o /reports/trivy-report.html ${IMAGE_NAME}

          echo "Reports created:"
          ls -la ${REPORT_DIR}
        '''
      }
    }

    stage('Optional: Fail if critical found') {
      steps {
        sh '''
          set -ex
          if ! command -v jq >/dev/null 2>&1; then
            echo "jq not found, installing (requires sudo)..."
            sudo apt-get update && sudo apt-get install -y jq
          fi
          CRIT_COUNT=$(jq '[.Results[].Vulnerabilities[]? | select(.Severity=="CRITICAL")] | length' ${REPORT_DIR}/trivy-report.json)
          echo "CRITICAL vulnerabilities found: ${CRIT_COUNT}"
          if [ "${CRIT_COUNT}" -gt 0 ]; then
            echo "Failing build due to CRITICAL vulnerabilities."
            exit 1
          fi
        '''
      }
    }
  }

  post {
    always {
      archiveArtifacts artifacts: "${REPORT_DIR}/**", fingerprint: true, allowEmptyArchive: true
      publishHTML([
        allowMissing: false,
        alwaysLinkToLastBuild: true,
        keepAll: true,
        reportDir: "${REPORT_DIR}",
        reportFiles: 'trivy-report.html',
        reportName: 'Trivy Vulnerability Report'
      ])
    }
    failure {
      echo 'Build failed — check console output and archived reports.'
    }
  }
}
