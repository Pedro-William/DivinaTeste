document.addEventListener('DOMContentLoaded', () => {

    const hamburgerBtn = document.querySelector('.a-hamburger-btn');
    const menuList = document.getElementById('menu-list');

    const loginIcon = document.getElementById('login-icon');
    const userDropdown = document.getElementById('user-dropdown-menu');

    const cartIconLink = document.getElementById('cart-icon-link');
    const miniCartOverlay = document.getElementById('mini-cart-overlay');
    const miniCart = document.getElementById('mini-cart');
    const closeCartBtn = document.getElementById('close-cart-btn');

    // -------------------------------------------------------------------
    // A. LÓGICA DO MENU HAMBÚRGUER
    // -------------------------------------------------------------------
    if (hamburgerBtn && menuList) {
        hamburgerBtn.addEventListener('click', () => {
            const isExpanded = hamburgerBtn.getAttribute('aria-expanded') === 'true';
            hamburgerBtn.setAttribute('aria-expanded', !isExpanded);
            menuList.classList.toggle('is-open');
        });
    }

    // -------------------------------------------------------------------
    // B. LÓGICA DO DROPDOWN DE LOGIN/USUÁRIO
    // -------------------------------------------------------------------
    if (loginIcon && userDropdown) {
        loginIcon.addEventListener('click', (event) => {
            event.stopPropagation();
            userDropdown.classList.toggle('is-active');
            userDropdown.classList.toggle('is-visible'); // MANTÉM is-visible E is-active para compatibilidade
        });

        document.addEventListener('click', (event) => {
            if (!loginIcon.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.remove('is-active');
                userDropdown.classList.remove('is-visible');
            }
        });
        
        userDropdown.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    }

    // -------------------------------------------------------------------
    // C. LÓGICA DO MINI CARRINHO LATERAL
    // -------------------------------------------------------------------
    function closeMiniCart() {
        if (miniCartOverlay && miniCart) {
            miniCartOverlay.classList.remove('is-open');
            miniCart.classList.remove('is-open');
            document.body.style.overflow = '';
        }
    }

    if (cartIconLink && miniCartOverlay && closeCartBtn && miniCart) {
        cartIconLink.addEventListener('click', (e) => {
            e.preventDefault();
            miniCartOverlay.classList.add('is-open');
            miniCart.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        });

        closeCartBtn.addEventListener('click', closeMiniCart);

        miniCartOverlay.addEventListener('click', (event) => {
            if (event.target.id === 'mini-cart-overlay') {
                closeMiniCart();
            }
        });
    }

    // -------------------------------------------------------------------
    // D. LÓGICA UNIVERSAL DO CARROSSEL DE PRODUTOS/LINHAS (Sem Loop)
    // -------------------------------------------------------------------
    function initializeCarousel(carouselId) {
        const carouselView = document.getElementById(carouselId);
        if (!carouselView) return;
    
        const slideContainer = carouselView.querySelector('.m-product-row, .m-category-row');
        const slides = slideContainer ? slideContainer.children : [];
        const indicatorsContainer = carouselView.querySelector('.m-carousel-indicators');
        const prevBtn = carouselView.querySelector('.a-carousel-control--prev');
        const nextBtn = carouselView.querySelector('.a-carousel-control--next');
    
        if (slides.length === 0 || !slideContainer || !indicatorsContainer) return;
    
        let currentIndex = 0;
        let cardsPerView = 0;
        let maxSlides = 0;
        let cardWithGap = 0;
        let buttonClickCount = 0;
    
        function calculateCardsPerView() {
            const slideWidth = slides[0].offsetWidth;
            if (slideWidth <= 0) return;
    
            const style = window.getComputedStyle(slideContainer);
            const gap = parseInt(style.getPropertyValue('gap')) || 20;
            cardWithGap = slideWidth + gap;
    
            cardsPerView = Math.floor(carouselView.offsetWidth / cardWithGap) || 1;
            maxSlides = Math.ceil(slides.length / cardsPerView) - 1;
            if (maxSlides < 0) maxSlides = 0;
        }
    
        function createIndicators() {
            indicatorsContainer.innerHTML = '';
    
            for (let i = 0; i <= Math.min(maxSlides, 1); i++) {
                const button = document.createElement('button');
                button.classList.add('a-indicator');
                if (i === currentIndex) {
                    button.classList.add('a-indicator--active');
                }
                button.dataset.slideTo = i;
                indicatorsContainer.appendChild(button);
            }
    
            indicatorsContainer.querySelectorAll('.a-indicator').forEach(indicator => {
                indicator.addEventListener('click', (event) => {
                    const targetButton = event.target.closest('.a-indicator');
                    if (!targetButton) return;
    
                    const targetIndex = parseInt(targetButton.dataset.slideTo);
                    currentIndex = targetIndex;
                    updateCarouselPosition();
                });
            });
    
            const controlsDisplay = maxSlides > 0 ? '' : 'none';
            if (prevBtn) prevBtn.style.display = controlsDisplay;
            if (nextBtn) nextBtn.style.display = controlsDisplay;
            indicatorsContainer.style.display = maxSlides > 0 ? 'flex' : 'none';
        }
    
        function updateCarouselPosition() {
            let offset = currentIndex * cardsPerView * cardWithGap;
            const maxOffset = slideContainer.scrollWidth - carouselView.clientWidth;
            offset = Math.min(offset, maxOffset);
    
            slideContainer.style.transform = `translateX(-${offset}px)`;
    
            indicatorsContainer.querySelectorAll('.a-indicator').forEach((indicator, index) => {
                indicator.classList.toggle('a-indicator--active', index === currentIndex);
            });
    
            if (prevBtn) prevBtn.disabled = false;
            if (nextBtn) nextBtn.disabled = false;
        }
    
        function handleButtonClick(direction) {
            buttonClickCount++;
            if (buttonClickCount >= 2) {
                currentIndex = 0;
                buttonClickCount = 0;
            } else {
                if (direction === 'next') {
                    currentIndex++;
                    if (currentIndex > maxSlides) currentIndex = 0;
                } else if (direction === 'prev') {
                    currentIndex--;
                    if (currentIndex < 0) currentIndex = maxSlides;
                }
            }
            updateCarouselPosition();
        }
    
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                handleButtonClick('prev');
            });
        }
    
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                handleButtonClick('next');
            });
        }
    
        function initializeAndListen() {
            calculateCardsPerView();
            createIndicators();
            updateCarouselPosition();
        }
    
        initializeAndListen();
        window.addEventListener('resize', initializeAndListen);
    }
    
    initializeCarousel('carousel-destaques');
    initializeCarousel('carousel-linhas');
    initializeCarousel('carousel-novidades');
    
    
    // -------------------------------------------------------------------
    // E. LÓGICA DO CARROSSEL DE TEXTO SOBRE NÓS
    // -------------------------------------------------------------------
    function initializeAboutCarousel(sectionId) {
        const section = document.getElementById(sectionId);
        if (!section) return;

        const slides = section.querySelectorAll('.a-about-slide');
        const indicatorsContainer = section.querySelector('#about-indicators');
        const indicators = indicatorsContainer ? indicatorsContainer.querySelectorAll('.a-indicator') : [];

        if (slides.length <= 1) return;
        
        let currentSlideIndex = 0;

        function updateAboutSlide() {
            slides.forEach((slide, index) => {
                slide.classList.toggle('a-about-slide--active', index === currentSlideIndex);
            });

            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('a-indicator--active', index === currentSlideIndex);
            });
        }

        indicators.forEach(indicator => {
            indicator.addEventListener('click', (event) => {
                const targetButton = event.target.closest('.a-indicator');
                if (targetButton && targetButton.dataset.slideTo) {
                    currentSlideIndex = parseInt(targetButton.dataset.slideTo);
                    updateAboutSlide();
                }
            });
        });

        updateAboutSlide();
    }

    initializeAboutCarousel('about-carousel-section');
    
    // -------------------------------------------------------------------
    // F. LÓGICA PARA ALTERNAR VISIBILIDADE DA SENHA
    // -------------------------------------------------------------------
    const togglePasswordIcons = document.querySelectorAll('.toggle-password');

    togglePasswordIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const passwordInput = document.getElementById(targetId);

            if (passwordInput) {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            }
        });
    });

    // -------------------------------------------------------------------
    // G. POPULAR SELECTS DE DATA DE NASCIMENTO
    // -------------------------------------------------------------------
    const diaSelect = document.getElementById('dia');
    const mesSelect = document.getElementById('mes');
    const anoSelect = document.getElementById('ano');

    if (diaSelect && mesSelect && anoSelect) {
        for (let i = 1; i <= 31; i++) {
            const option = document.createElement('option');
            option.value = i.toString().padStart(2, '0');
            option.textContent = i.toString().padStart(2, '0');
            diaSelect.appendChild(option);
        }

        const meses = [
            'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
        ];
        meses.forEach((mes, index) => {
            const option = document.createElement('option');
            option.value = (index + 1).toString().padStart(2, '0');
            option.textContent = mes;
            mesSelect.appendChild(option);
        });

        const anoAtual = new Date().getFullYear();
        for (let i = anoAtual; i >= anoAtual - 100; i--) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            anoSelect.appendChild(option);
        }
    }
    
    // -------------------------------------------------------------------
    // H. LÓGICA DE QUANTIDADE DE PRODUTOS (Página de Detalhes)
    // -------------------------------------------------------------------
    const quantityInput = document.getElementById('product-quantity-input');
    const minusButton = document.querySelector('.a-qty-btn--minus');
    const plusButton = document.querySelector('.a-qty-btn--plus');
    
    if (quantityInput && minusButton && plusButton) {
        function updateQuantity(amount) {
            let currentValue = parseInt(quantityInput.value) || 1;
            let newValue = currentValue + amount;
            
            if (newValue < 1) {
                newValue = 1;
            }
            
            quantityInput.value = newValue;
        }

        minusButton.addEventListener('click', () => {
            updateQuantity(-1);
        });

        plusButton.addEventListener('click', () => {
            updateQuantity(1);
        });
        
        quantityInput.addEventListener('change', () => {
            let currentValue = parseInt(quantityInput.value);
            if (isNaN(currentValue) || currentValue < 1) {
                quantityInput.value = 1;
            }
        });
    }
});


/*PAGINA ADMIN*/




/**
 * ARQUIVO: script.js
 * FUNÇÕES: Menu Hambúrguer, Máscaras de Input (Nome, Moeda), Rolagem, Confirmação.
 */

// ===========================================
// FUNÇÕES DE UTILIDADE GERAL
// ===========================================

// Função de Confirmação para Exclusão (usada nas listagens)
function confirmDeletion(message = 'Tem certeza que deseja deletar este item?') {
    return confirm(message);
}

// Máscara de Moeda (BRL)
function mascaramoeda(campo) {
    let v = campo.value.replace(/\D/g, '');
    if (v.length === 0) v = '0';
    let valor = (parseInt(v) / 100).toFixed(2);
    campo.value = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    }).format(valor);
}

// Máscara de CNPJ (Placeholder - Código Real necessário se usado)
function mascaracnpj(campo) {
    // Exemplo de implementação real (pode ser ajustado)
    let v = campo.value.replace(/\D/g, ''); 
    v = v.replace(/^(\d{2})(\d)/, '$1.$2'); 
    v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3'); 
    v = v.replace(/\.(\d{3})(\d)/, '.$1/$2'); 
    v = v.replace(/(\d{4})(\d)/, '$1-$2'); 
    campo.value = v;
}

// Máscara de Telefone (Placeholder - Código Real necessário se usado)
function mascaratelefone(campo) {
    // Exemplo de implementação real (pode ser ajustado para celular/fixo)
    let v = campo.value.replace(/\D/g, '');
    v = v.replace(/^(\d{2})(\d)/g, '($1) $2');
    v = v.replace(/(\d)(\d{4})$/, '$1-$2');
    campo.value = v;
}

// Funções de Rolagem (usadas na lista de produtos)
function scrollToBottom() {
    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}


// ===========================================
// INICIALIZAÇÃO DO DOM
// ===========================================

document.addEventListener("DOMContentLoaded", () => {
    // 1. Inicialização do Menu Hambúrguer
    const menuBtn = document.querySelector('.menu-btn');
    const hamburguer = document.querySelector('.hamburguer');
    const categories = document.querySelectorAll(".category");

    // Alterna o menu hambúrguer
    if (menuBtn && hamburguer) { // Verifica se os elementos existem
        menuBtn.addEventListener("click", (event) => {
            hamburguer.classList.toggle("active");
            event.stopPropagation();

            const isExpanded = hamburguer.classList.contains("active");
            menuBtn.setAttribute("aria-expanded", isExpanded);
            menuBtn.innerHTML = isExpanded ? "✖" : "&#9776;";
        });

        // Submenu por categoria
        categories.forEach(category => {
            category.addEventListener("click", (event) => {
                event.stopPropagation();
                const submenu = category.querySelector(".submenu");
                const isActive = category.classList.contains("active");

                // Fecha todos
                categories.forEach(cat => {
                    cat.classList.remove("active");
                    const sm = cat.querySelector(".submenu");
                    if (sm) {
                        sm.style.maxHeight = "0";
                        sm.style.opacity = "0";
                    }
                });

                // Se não estava ativa, abre essa
                if (!isActive && submenu) {
                    category.classList.add("active");
                    submenu.style.maxHeight = "500px";
                    submenu.style.opacity = "1";
                }
            });
        });

        // Fecha menu e submenus ao clicar fora
        document.addEventListener("click", (event) => {
            if (!hamburguer.contains(event.target) && !menuBtn.contains(event.target)) {
                hamburguer.classList.remove("active");
                menuBtn.setAttribute("aria-expanded", "false");
                menuBtn.innerHTML = "&#9776;";

                // Fecha todos submenus
                categories.forEach(category => {
                    const submenu = category.querySelector(".submenu");
                    if (submenu) {
                        submenu.style.maxHeight = "0";
                        submenu.style.opacity = "0";
                        category.classList.remove("active");
                    }
                });
            }
        });
    }

    // 2. Validação/Máscara de Nome
    const nomeInput = document.getElementById("nome");
    if (nomeInput) {
        nomeInput.addEventListener("input", function () {
            // Permite apenas letras e espaços (incluindo letras acentuadas)
            this.value = this.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, ''); 
        });
    }
    
    // 3. Adicione aqui a inicialização para outras máscaras/eventos DOM, se necessário.

});