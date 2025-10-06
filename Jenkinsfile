pipeline {
    agent any

    environment {
        IMAGE_NAME = 'nginx:latest'  // You can change this to your own image
    }

    stages {
        stage('Pull Docker Image') {
            steps {
                bat "docker pull ${IMAGE_NAME}"
            }
        }

        stage('Run Trivy Scan') {
            steps {
                bat """
                docker run --rm ^
                    -v %cd%:/root/.cache/ ^
                    aquasec/trivy image --format json -o trivy-report.json ${IMAGE_NAME}
                """
            }
        }

        stage('Convert JSON to HTML') {
            steps {
                bat 'python json_to_html.py'
            }
        }

        stage('Publish Trivy Report') {
            steps {
                publishHTML (target: [
                    reportDir: '.',
                    reportFiles: 'trivy-report.html',
                    reportName: 'Trivy Security Report',
                    keepAll: true
                ])
            }
        }
    }
}
