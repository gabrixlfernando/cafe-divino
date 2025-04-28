<section  class="contact-info">
            <h2>CONTATE-NOS</h2>
            <h3>Sinta-se à Vontade Para Entrar Em Contato</h3>
            <div data-aos="fade-up" class="contact-icons">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Endereço</h4>
                    <p>Avenida Marechal Tito, 1500</p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <h4>Telefone</h4>
                    <p>(11) 5456-789</p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <h4>Email</h4>
                    <p>cafedivino@smpsistema.com</p>
                </div>
            </div>
        </section>

        <!-- FORM PHP -->
        <section class="contact-form container-fluid">
            <div class="containeer">
                <form id="contactForm" action="<?php echo BASE_URL?>contato/enviar" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Seu Nome"
                            required>
                        <input type="email" name="email" placeholder="Seu Email"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Assunto"
                            required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" rows="5" placeholder="Mensagem"
                            required></textarea>
                    </div>
                    <button type="submit">Enviar Mensagem</button>
                    <!-- Mensagem de sucesso ou erro -->
                    <div id="responseMessage" style="display: none;"></div>
                </form>
            </div>
        </section>