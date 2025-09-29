pipeline {
  agent any

  environment {
    IMAGE_NAME   = "nginx:latest"                     // change to your image
    REPORT_DIR   = "trivy-reports"
    TEMPLATE_PATH = "/var/lib/jenkins/trivy-html.tpl" // template from Step 2
  }

  stages {
    stage('Trivy Scan') {
      steps {
        sh '''
          set -ex
          mkdir -p ${REPORT_DIR}

          # JSON report
          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "${PWD}/${REPORT_DIR}":/reports \
            -v "${TEMPLATE_PATH}":/templates/html.tpl:ro \
            aquasecurity/trivy:latest image \
            --format json -o /reports/trivy-report.json ${IMAGE_NAME}

          # HTML report
          docker run --rm \
            -v /var/run/docker.sock:/var/run/docker.sock \
            -v "${PWD}/${REPORT_DIR}":/reports \
            -v "${TEMPLATE_PATH}":/templates/html.tpl:ro \
            aquasecurity/trivy:latest image \
            --format template --template @/templates/html.tpl -o /reports/trivy-report.html ${IMAGE_NAME}
        '''
      }
    }
  }

  post {
    always {
      archiveArtifacts artifacts: "${REPORT_DIR}/*", fingerprint: true
      publishHTML([
        reportDir: "${REPORT_DIR}",
        reportFiles: "trivy-report.html",
        reportName: "Trivy Vulnerability Report",
        keepAll: true,
        alwaysLinkToLastBuild: true
      ])
    }
  }
}
