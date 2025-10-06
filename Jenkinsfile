pipeline {
    agent any

    stages {
        stage('Pull Docker Image') {
            steps {
                sh 'docker pull nginx:latest'
            }
        }

        stage('Run Trivy Scan') {
            steps {
                sh '''
                    docker run --rm -v /var/run/docker.sock:/var/run/docker.sock \
                    -v $(pwd):/root/.cache/ aquasec/trivy image \
                    --format json -o trivy-report.json nginx:latest
                '''
            }
        }

        stage('Convert JSON to HTML') {
            steps {
                sh '''
                    python3 - <<'EOF'
import json
from json2html import json2html
with open('trivy-report.json') as f:
    data = json.load(f)
html = json2html.convert(json=data)
with open('trivy-report.html', 'w') as f:
    f.write(html)
EOF
                '''
            }
        }

        stage('Publish Trivy Report') {
            steps {
                publishHTML(target: [
                    allowMissing: false,
                    alwaysLinkToLastBuild: true,
                    keepAll: true,
                    reportDir: '.',
                    reportFiles: 'trivy-report.html',
                    reportName: 'Trivy Vulnerability Report'
                ])
            }
        }
    }
}
