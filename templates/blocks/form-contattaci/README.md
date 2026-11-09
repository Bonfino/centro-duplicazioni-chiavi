# Form contattaci

Il blocco usa i campi SCF `label`, `title`, `background_image` (Array),
`form` (Oggetto articolo) e `phone_text`.
Assegnare il gruppo SCF al blocco **Form contattaci**.

Per `form`, filtrare il tipo di contenuto sui moduli Contact Form 7
(`wpcf7_contact_form`), scegliere il formato di restituzione **Oggetto articolo**
e disattivare la selezione multipla.

La sezione ha ID `form-contattaci`: nel link del pulsante della hero usare
`#form-contattaci`, con apertura nella stessa finestra.
Se viene impostata un'ancora HTML nelle opzioni avanzate del blocco, quella
sostituisce l'ID predefinito e va usata anche nel collegamento.

## Modulo Contact Form 7

In **Contatto**, creare o modificare il modulo e incollare questo contenuto
nella scheda **Modulo**. Le classi Bootstrap gestiscono il layout: due colonne
da `md` in su e una colonna su mobile.

```html
<div class="row g-3 g-md-4">
    <div class="col-md-6">
        <label class="d-block font-heading small lh-base fw-medium">Nome
            [text* your-name class:form-control class:rounded-3 class:mt-2 autocomplete:given-name]
        </label>
    </div>
    <div class="col-md-6">
        <label class="d-block font-heading small lh-base fw-medium">Cognome
            [text* your-surname class:form-control class:rounded-3 class:mt-2 autocomplete:family-name]
        </label>
    </div>
    <div class="col-md-6">
        <label class="d-block font-heading small lh-base fw-medium">Email <span class="text-body-secondary fw-normal">(facoltativa)</span>
            [email your-email class:form-control class:rounded-3 class:mt-2 autocomplete:email]
        </label>
    </div>
    <div class="col-md-6">
        <label class="d-block font-heading small lh-base fw-medium">Telefono
            [tel* your-phone class:form-control class:rounded-3 class:mt-2 autocomplete:tel]
        </label>
    </div>
    <div class="col-12">
        <label class="d-block font-heading small lh-base fw-medium">Messaggio
            [textarea* your-message class:form-control class:rounded-3 class:mt-2 x4]
        </label>
    </div>
    <div class="col-12 small lh-base">
        [acceptance privacy]Accetto e dichiaro di aver letto <a class="link-dark" href="/privacy-policy/">l'informativa sulla privacy</a>.[/acceptance]
    </div>
    <div class="col-12">
        [submit class:btn class:btn-secondary class:text-white class:font-heading class:fw-semibold class:py-2 class:w-100 "Invia richiesta"]
    </div>
</div>
```

Verificare nel modulo il collegamento alla pagina privacy effettiva del sito.
Configurare destinatario, mittente e messaggi nella relativa schermata di Contact Form 7.
I mail-tag disponibili sono `[your-name]`, `[your-surname]`, `[your-email]`,
`[your-phone]` e `[your-message]`.

Salvare il modulo e selezionarlo nel campo SCF `form` del blocco.
Titoli, immagine e contatto telefonico si modificano nei campi SCF.
Le etichette dei campi, l'accettazione e il pulsante si modificano in Contact Form 7.

## Pubblicazione

Eseguire `npm run build` e caricare la cartella del blocco e `assets/dist/`.
Non serve aggiungere inclusioni in `functions.php` o import degli asset.
L'anteprima dell'editor usa il blocco statico gestito dagli asset editor del tema.

Sintassi dei tag: [campi di testo](https://contactform7.com/text-fields/),
[accettazione](https://contactform7.com/acceptance-checkbox/),
[pulsante invio](https://contactform7.com/submit-button/).
