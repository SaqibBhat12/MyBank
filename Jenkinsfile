pipeline {
  agent any

  environment {
    IMAGE_NAME = "myapp:latest"                           // change as needed
    REPORT_DIR  = "trivy-reports"
    HTML_TEMPLATE = "/var/lib/jenkins/trivy-html.tpl"     // path from Step 1
    FAIL_ON_CRITICAL = "true"                             // "true" or "false"
  }

  stages {
    stage('Checkout') {
      steps {
        // change repo/branch or remove if not needed
        git branch: 'main', url: 'https://github.com/your/repo.git'
      }
    }

    stage('Build Docker Image') {
      steps {
        script {
          // if you don't want to build image, remove this stage and set IMAGE_NAME to existing image
          sh 'docker build -t ${IMAGE_NAME} .'
        }
      }
    }

    stage('Trivy Scan - JSON + HTML') {
      steps {
        script {
          sh '''
            set -e
            mkdir -p ${REPORT_DIR}

            # ensure DB up-to-date (optional but recommended)
            trivy --download-db-only

            # 1) JSON report (raw)
            trivy image --format json -o ${REPORT_DIR}/trivy-report.json ${IMAGE_NAME}

            # 2) HTML report using template
            trivy image --format template --template @${HTML_TEMPLATE} \
              -o ${REPORT_DIR}/trivy-report.html ${IMAGE_NAME}
          '''
        }
      }
    }

    stage('Fail on Critical (optional)') {
      steps {
        script {
          sh '''
            if [ "${FAIL_ON_CRITICAL}" = "true" ]; then
              if ! command -v jq >/dev/null 2>&1; then
                echo "jq not found - installing..."
                sudo apt-get update && sudo apt-get install -y jq
              fi

              CRIT_COUNT=$(jq '[.Results[].Vulnerabilities[]? | select(.Severity=="CRITICAL")] | length' ${REPORT_DIR}/trivy-report.json)
              echo "CRITICAL vulnerabilities: ${CRIT_COUNT}"
              if [ "${CRIT_COUNT}" -gt 0 ]; then
                echo "Failing build due to CRITICAL vulnerabilities."
                exit 1
              fi
            else
              echo "FAIL_ON_CRITICAL is false -> not failing build."
            fi
          '''
        }
      }
    }
  }

  post {
    always {
      // archive artifacts so you can download JSON/HTML
      archiveArtifacts artifacts: "${REPORT_DIR}/**", fingerprint: true, allowEmptyArchive: true

      // publish HTML report (HTML Publisher plugin required)
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
      echo "Build failed — check console output and the archived trivy-reports."
    }
  }
}
