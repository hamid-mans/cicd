pipeline {
    agent any // On utilise l'agent Jenkins par défaut partout

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('PHP Unit Tests') {
            steps {
                echo 'Exécution des tests via un conteneur éphémère...'

                // On monte le dossier de travail actuel dans un conteneur composer officiel
                // -v ${WORKSPACE}:/app : partage le code avec le conteneur
                // -w /app : définit le dossier de travail dans le conteneur
                // --rm : supprime le conteneur dès qu'il a fini

                sh 'docker run --rm -v ${WORKSPACE}:/app -w /app composer:2 sh -c "composer install --no-interaction && vendor/bin/phpunit"'
            }
        }

        stage('Deploy') {
            steps {
                echo 'Prêt pour le déploiement manuel dès que les tests passent !'
            }
        }
    }

    post {
        always {
            echo 'Fin du build.'
        }
    }
}