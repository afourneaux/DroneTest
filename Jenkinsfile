pipeline {
    agent any
    stages {
        stage('build') {
            steps {
                bat 'ls'
                bat './unittest/vendor/bin/phpunit'
            }
        }
    }
}
