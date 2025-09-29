pipeline {
  agent any

  environment {
    IMAGE_NAME    = "nginx:latest"                     // 🔹 change this to your Docker image
    REPORT_DIR    = "trivy-reports"
    TEMPLATE_PATH = "/var/lib/jenkins/trivy-html.tpl"  // 🔹 path to HTML template (copied earlier)
  }

  stages {
    stage('Trivy Scan') {
      steps {
        // Wrap with catchError so pipeline always continues
        catchError(buildResult: 'SUCCESS', stageResult: 'SUCCESS') {
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

            echo "✅ Trivy scan finished. Reports stored in ${REPORT_DIR}"
            ls -la ${REPORT_DIR} || true
          '''
        }
      }
    }
  }

  post {
    always {
      // Archive reports (ignore errors if files missing)
      catchError(buildResult: 'SUCCESS', stageResult: 'SUCCESS') {
        archiveArtifacts artifacts: "${REPORT_DIR}/*", fingerprint: true, allowEmptyArchive: true
      }

      // Publish HTML report (ignore errors if missing)
      catchError(buildResult: 'SUCCESS', stageResult: 'SUCCESS') {
        publishHTML([
          allowMissing: true,
          alwaysLinkToLastBuild: true,
          keepAll: true,
          reportDir: "${REPORT_DIR}",
          reportFiles: "trivy-report.html",
          reportName: "Trivy Vulnerability Report"
        ])
      }
    }
  }
}
