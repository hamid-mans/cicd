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
                    image 'composer:2' // Image officielle qui contient PHP + Composer
                    reuseNode true     // Réutilise le même espace de travail
                }
            }
            steps {
                echo 'Installation des dépendances PHP...'
                // --no-interaction est important pour éviter que Jenkins attende une saisie clavier
                sh 'composer install --no-interaction --prefer-dist'

                echo 'Exécution des tests PHPUnit...'
                sh 'vendor/bin/phpunit'
            }
        }

        stage('Deploy') {
            agent any
            steps {
                echo 'Ici se fera ton déploiement une fois les tests au vert !'
                // On configurera cette partie dès que tes tests passeront
            }
        }
    }

    post {
        always {
            cleanWs() // Nettoie le dossier de travail après le build
        }
    }
}