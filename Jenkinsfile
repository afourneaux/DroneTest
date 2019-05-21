pipeline {
    agent any
    stages {
        stage('build') {
            steps {
                bat 'dir'
                bat './unittest/vendor/bin/phpunit'
            }
        }
    }
}
