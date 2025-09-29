pipeline {
  agent any

  environment {
    IMAGE_NAME    = "nginx:latest"                     // 🔹 change this to your Docker image
    REPORT_DIR    = "trivy-reports"
    TEMPLATE_PATH = "/var/lib/jenkins/trivy-html.tpl"  // 🔹 HTML template path
  }

  stages {
    stage('Trivy Scan') {
      steps {
        sh '''
          set -ex
          mkdir -p ${REPORT_DIR}

          echo "🔍 Running Trivy scan on ${IMAGE_NAME}..."

          # JSON report
          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "${PWD}/${REPORT_DIR}":/reports \
            -v "${TEMPLATE_PATH}":/templates/html.tpl:ro \
            aquasecurity/trivy:latest image \
            --format json -o /reports/trivy-report.json ${IMAGE_NAME} || true

          # HTML report
          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "${PWD}/${REPORT_DIR}":/reports \
            -v "${TEMPLATE_PATH}":/templates/html.tpl:ro \
            aquasecurity/trivy:latest image \
            --format template --template @/templates/html.tpl -o /reports/trivy-report.html ${IMAGE_NAME} || true

          echo "✅ Trivy scan completed. Reports saved in ${REPORT_DIR}"
          ls -la ${REPORT_DIR}
        '''
      }
    }
  }

  post {
    always {
      archiveArtifacts artifacts: "${REPORT_DIR}/*", fingerprint: true
      publishHTML([
  allowMissing: false,
  alwaysLinkToLastBuild: true,
  keepAll: true,
  reportDir: "${REPORT_DIR}",
  reportFiles: "trivy-report.html",
  reportName: "Trivy Vulnerability Report"
])

    }
  }
}
