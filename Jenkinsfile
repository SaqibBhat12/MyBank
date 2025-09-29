pipeline {
    agent any

    stages {
        stage('Trivy Scan JSON') {
            steps {
                // ✅ Create the folder here
                sh '''
                mkdir -p trivy-reports
                docker run --rm \
                  -v /var/run/docker.sock:/var/run/docker.sock \
                  -v $PWD/trivy-reports:/reports \
                  aquasecurity/trivy:latest image \
                  --format json -o /reports/trivy-report.json nginx:latest
                '''
            }
        }

        stage('Trivy JSON to HTML') {
            steps {
                sh '''
                docker run --rm \
                  -v /var/run/docker.sock:/var/run/docker.sock \
                  -v $PWD/trivy-reports:/reports \
                  aquasecurity/trivy:latest image \
                  --format template --template "@contrib/html.tpl" \
                  -o /reports/trivy-report.html nginx:latest
                '''
            }
        }
    }

    post {
        always {
            archiveArtifacts artifacts: 'trivy-reports/*', fingerprint: true
            publishHTML([
              allowMissing: false,
              alwaysLinkToLastBuild: true,
              keepAll: true,
              reportDir: 'trivy-reports',
              reportFiles: 'trivy-report.html',
              reportName: 'Trivy Vulnerability Report'
            ])
        }
    }
}
