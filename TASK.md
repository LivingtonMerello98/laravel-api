[x] creare la migration per la tabella technologies
[x] creare il model Technology
[x] creare la migration per la tabella pivot project_technology
[x] aggiungere ai model Technology e Project i metodi per definire la relazione many to many
[x] visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti

[x]Bonus 1:
creare il seeder per il model Technology.

[]Bonus 2:
aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.

#rimuovere image

[x] rimuovere colonna image con una migration
[x] rimuovere dal model Project
[x] rimuovere dal ProjectController
    store(), update() 
[x] rimuovere dal Projects/index
[x] rimuovere dal Projects/create
[x] rimuovere dal Projects/edit
[x] rimuovere dal Projects/show


#implementazione di cover

[x]integrare cover nel model Project
[x]integrare cover nel ProjectController

    create() destroy()

[x] integrare cover nel index
[x] integrare cover nello show

DA RISOLVERE
[x] integrare l update di cover

    update() 


[x]permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
[x]gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione
[x]eliminare opportunamente le relazioni alla cancellazione del progetto/technology