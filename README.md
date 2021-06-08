# Tasca M14

    - Descripció
    En aquesta pràctica aprendras a crear una API completa. Hauras de crear una aplicació, per a una botiga de cuadres, aplicant el patró de disseny de software MVC(Model-Vista-Controlador). 

    # Nivell 1
        - Exercici 1

        Tenim una franquicia de botiga de quadres il·legals que fa veure que ven collarets blancs, per això es diu “white collar”. 

        Aquesta franquicia té varies botigues, cadascuna amb un nom i una capacitat màxima de quadres (o collars^^). Hi ha quadres que tenen un nom d’autor i d’altres que són anònims. Això sí, tots tenen un nom, un preu i una data d’entrada (és la data del moment en el que entra a la botiga). El client ens demana implementar una API REST amb Laravel. Aquesta API ha de cumplir les següents funcionalitats:
            · Crear botiga: li direm el nom i la capacitat (POST /shops/).
            · Llistar botigues: retorna la llista de botigues amb el seu nom i la capacitat (GET /shops/).
            · Afegir quadre: li donarem el nom del quadre i el del autor (POST /shops/{ID}/pictures)
            · Llistar els quadres de la botiga (GET /shops/{ID}/pictures).
            · Incendiar quadres: per si ve la policia, es poden eliminar tots els quadres de la botiga sense deixar rastre (DELETE /shops/{ID}/pictures).
            
        NOTES: Has de tindre en compte els següents detalls de construcció:
            · Dissenya la base de dades com a primer pas. Utilitza ELOQUENT per accedir-hi.
            · Inclou en un directori del projecte la col·lecció Postman per a les invocacions http
            · Per a consultes a mysql, utilitzeu MysqlWorkbench. Si ho prefereixes, també pots utilitzar DataGrip, Dbeaver o altres.

    - Nivell 2
        - Exercici 2
        Afegeix el sistema de control d’accés de Laravel Passport. Defineix el login, registre i recuperació de contrasenya que l'usuari necessita per accedir a l'aplicació. Fes us de la configuració per defecte.

        - Exercici 3
        Defineix sistema de rols i bloqueja el accés a les diferents rutes segons el seu nivell de privilegis.

    Nivell 3
        - Exercici 4
        Crea una aplicació frontal amb AJAX per a consumir les dades de les diferents rutes. Si vols pots fer-la per mitjà d’un framework: Angular, Vue, React...
        
        - Exercici 5
        Soluciona el CORS.

        Recursos