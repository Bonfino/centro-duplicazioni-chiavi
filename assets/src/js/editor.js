// Blocca anche il focus da tastiera, mantenendo selezionabile il blocco esterno.
function disableBlockPreviews() {
    document.querySelectorAll('.acf-block-preview > .block').forEach((preview) => {
        preview.inert = true;
    });
}

disableBlockPreviews();

// SCF sostituisce il markup dell'anteprima quando vengono modificati i campi.
new MutationObserver(disableBlockPreviews).observe(document.body, {
    childList: true,
    subtree: true,
});
