pipeline {
    agent none // On ne bloque pas d'agent globalement

    stages {
        stage('Checkout') {
            agent any
            steps {
                checkout scm
            }
        }

        stage('PHP Unit Tests') {
            agent {
                docker {
                    image 'composer:2'
                    // On force l'exécution en utilisateur root pour éviter les conflits de droits sur les fichiers clonés
                    args '-u root'
                }
            }
            steps {
                echo 'Installation des dépendances PHP...'
                sh 'composer install --no-interaction --prefer-dist'

                echo 'Exécution des tests PHPUnit...'
                sh 'vendor/bin/phpunit'
            }
        }

        stage('Deploy') {
            agent any
            steps {
                echo 'Prêt pour le déploiement !'
            }
        }
    }

    post {
        always {
            echo 'Fin du build.'
        }
    }
}