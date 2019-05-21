pipeline {
    agent any
    stages {
        stage('build') {
            steps {
                bat 'unittest/vendor/bin/phpunit'
            }
        }
    }
}
