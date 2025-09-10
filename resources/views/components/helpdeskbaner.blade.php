<section class="py-5 px-3 my-5" style="background: linear-gradient(90deg, #380516  0%, #e0e0e0 100%); border-radius: 2rem; box-shadow: 0 8px 32px 0 rgba(44, 62, 80, 0.25); position: relative; overflow: hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('https://www.transparenttextures.com/patterns/diagmonds-light.png'); opacity: 0.08; pointer-events: none;"></div>
    <div class="container position-relative" style="z-index:2;">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="text-center text-md-start mb-4 mb-md-0">
                <h2 class="display-5 fw-bold mb-2" style="text-shadow: 0 2px 12px #0003;">¿Tienes una pregunta o necesitas ayuda?</h2>
                <p class="fs-5 mb-0" style="opacity:0.95;">
                    Nuestro equipo está listo para apoyarte. ¡Envíanos tu consulta y te responderemos lo antes posible!
                </p>
            </div>
            <div class="text-center text-md-end mt-4 mt-md-0">
                <a href="{{ route('helpdesk.create') }}"
                   class="btn btn-lg px-5 py-3 fw-bold rounded-pill shadow-lg"
                   style="background: linear-gradient(90deg, #fff 0%, #e0e7ff 100%); color: #380516; font-size: 1.3rem; border: none; letter-spacing: 1px; box-shadow: 0 4px 24px rgba(44,62,80,0.15); transition: transform 0.2s, box-shadow 0.2s;"
                   onmouseover="this.style.transform='scale(1.07)';this.style.boxShadow='0 8px 32px rgba(44,62,80,0.25)';"
                   onmouseout="this.style.transform='scale(1)';this.style.boxShadow='0 4px 24px rgba(44,62,80,0.15)';"
                >
                    <i class="bi bi-chat-dots-fill me-2"></i>
                    Ir a la Mesa de Ayuda
                </a>
            </div>
        </div>
    </div>
</section>