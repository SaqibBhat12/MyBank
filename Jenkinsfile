pipeline {
    agent any

    environment {
        PYTHON = 'python3'
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/vansh2K5/simple-python-p2'
            }
        }

        stage('Setup Python Environment') {
            steps {
                sh '''
                    set -e
                    rm -rf venv
                    $PYTHON -m venv venv
                    venv/bin/python --version
                    venv/bin/pip install --upgrade pip
                    if [ -f requirements.txt ]; then
                        venv/bin/pip install -r requirements.txt
                    else
                        echo "No requirements file found"
                    fi
                    venv/bin/pip install pytest
                '''
            }
        }

        stage('Run Tests') {
            steps {
                sh "venv/bin/python -m pytest tests"
            }
        }
    }

    post {
        always {
            echo 'Pipeline completed.'
        }
    }
}
