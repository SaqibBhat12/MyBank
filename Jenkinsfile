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
                // Scan the image and produce JSON output
                sh 'trivy image --format json -o trivy-report.json nginx:latest'
            }
        }

        stage('Convert JSON to HTML') {
            steps {
                // Use Python to convert Trivy JSON → HTML
                sh '''
                    echo "Converting JSON to HTML..."
                    python3 - <<'EOF'
import json
from json2html import *
with open("trivy-report.json") as f:
    data = json.load(f)
html = json2html.convert(json=data)
open("trivy-report.html", "w").write(html)
print("✅ Conversion done: trivy-report.html")
EOF
                '''
            }
        }

        stage('Publish Trivy Report') {
            steps {
                publishHTML(target: [
                    allowMissing: false,
                    keepAll: true,
                    reportDir: '.',
                    reportFiles: 'trivy-report.html',
                    reportName: 'Trivy Scan Report'
                ])
            }
        }
    }
}
