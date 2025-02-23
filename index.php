<?php include('components/header.php'); ?>

<main class="container bg-light p-4 my-5 shadow-lg flex-grow-1">
    <div class="text-center">
        <h1>
            🖼️ Conversor e Minificador de Imagens
        </h1>
        <p>
            Converta e minifique suas imagens online de forma automática. Suporta os formatos PNG, JPG e WEBP. 100%
            gratuito e sem complicação.
        </p>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <div class="mb-3">
                        <label for="fileInput" class="form-label">Escolha as imagens</label>
                        <input type="file" class="form-control" id="fileInput" accept="image/*" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="formatSelect" class="form-label">Escolha o formato final</label>
                        <select class="form-select" id="formatSelect">
                            <option value="png">PNG</option>
                            <option value="jpg">JPG</option>
                            <option value="webp">WEBP</option>
                        </select>
                    </div>
                    <button class="btn btn-primary w-100" onclick="convertAndMinifyImages()">
                        <i class="bi bi-arrow-repeat"></i> Converter e Minificar
                    </button>

                    <div class="mt-4" id="output"></div>

                    <button class="btn btn-success mt-3 w-100 d-none" id="downloadAll" onclick="downloadAllImages()">
                        <i class="bi bi-download"></i> Baixar Tudo
                    </button>
        </div>
        <div class="col-sm-12">
            <div class="mt-4 text-center">
                <p class="fw-semibold text-muted">💡 Ajude a manter o projeto online</p>

                <!-- Modal para exibir o código PIX -->
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pixModal">
                    Doar via PIX
                </button>

                <div class="modal fade" id="pixModal" tabindex="-1" aria-labelledby="pixModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pixModalLabel">Doar via PIX</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="img/pix.png" alt="QR Code PIX" class="img-fluid mb-3">
                                <p class="fw-bold">Chave PIX:</p>
                                <p class="text-primary">f80b5f2f-746e-467b-a4b4-7921bec5ee09</p>
                            </div>
                        </div>


                    </div>
                </div>
</main>

<?php include('components/footer.php'); ?>