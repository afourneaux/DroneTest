pipeline {
    agent any
    stages {
        stage('build') {
            steps {
                bat 'vendor/bin/phpunit'
            }
        }
    }
}
