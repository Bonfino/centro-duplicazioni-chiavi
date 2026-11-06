document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.block__slider-icons:not(.is-admin)').forEach((block) => {
        const rows = block.querySelectorAll('.slider-icons__row');
        if (!rows.length) return;

        rows.forEach((row) => {
            const track = row.querySelector('.slider-icons__track');
            const group = row.querySelector('.slider-icons__group');
            const logos = Array.from(group.children);

            function fillRow() {
                track.querySelector('[data-copy]')?.remove();
                group.querySelectorAll('[data-repeat]').forEach((copy) => copy.remove());

                // Riempie anche gli schermi larghi quando la galleria contiene pochi loghi.
                while (group.offsetWidth < row.clientWidth && group.offsetWidth > 0) {
                    logos.forEach((logo) => {
                        const copy = logo.cloneNode(true);
                        copy.dataset.repeat = '';
                        copy.setAttribute('aria-hidden', 'true');
                        group.append(copy);
                    });
                }

                const copy = group.cloneNode(true);
                copy.dataset.copy = '';
                copy.setAttribute('aria-hidden', 'true');
                track.append(copy);
                track.style.setProperty('--slider-icons-duration', `${group.offsetWidth / 40}s`);
            }

            fillRow();
            new ResizeObserver(fillRow).observe(row);
        });

        block.classList.add('is-ready');
    });
});
