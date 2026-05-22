pipeline {
    agent any

    stages {

        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/nenufalthugadini-byte-1788/3-tier-application.git'
            }
        }

        stage('Build Backend Docker Image') {
            steps {
                sh 'docker build -t backend-app ./backend'
            }
        }

        stage('Build Frontend Docker Image') {
            steps {
                sh 'docker build -t frontend-app ./frontend'
            }
        }

        stage('Check Docker Images') {
            steps {
                sh 'docker images'
            }
        }
    }
}
