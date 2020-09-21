<?php

use App\Auth;

require_once '../includes.php';

Auth::restricted();

include '../parts/header.php';

?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h2 class="mb-3">Boîte de réception</h2>
                <button type="button" class="btn btn-outline-primary btn-block mb-3" data-toggle="modal"
                        data-target="#newMessageModal">
                    <i class="fa fa-feather-alt"></i> Nouveau message
                </button>
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-message-1" data-toggle="list"
                       href="#message-1" role="tab">
                        <div class="d-flex justify-content-between">
                            <h5>Albert</h5>
                            <small>21.09.2020 à 18:33</small>
                        </div>
                        <div>Le sujet du message ici</div>
                    </a>
                    <a class="list-group-item list-group-item-action" id="list-message-2" data-toggle="list"
                       href="#message-2" role="tab">
                        <div class="d-flex justify-content-between">
                            <h5>Gil</h5>
                            <small>21.09.2020 à 18:33</small>
                        </div>
                        <div>Le sujet du message ici</div>
                    </a>
                    <a class="list-group-item list-group-item-action" id="list-message-3" data-toggle="list"
                       href="#message-3" role="tab">
                        <div class="d-flex justify-content-between">
                            <h5>Julien</h5>
                            <small>21.09.2020 à 18:33</small>
                        </div>
                        <div>Le sujet du message ici</div>
                    </a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="message-1" role="tabpanel">
                        <div class="btn-group mb-4" role="group" aria-label="First group">
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-reply"></i> Répondre</button>
                        </div>
                        <div style="overflow: auto; max-height: 600px">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad asperiores assumenda ipsam
                            minima quasi reprehenderit. Adipisci aut autem cum, dicta eos hic incidunt ipsam itaque
                            iusto nihil officiis quaerat quasi quo quos, ratione soluta sunt, temporibus ut vero
                            voluptas. Architecto beatae cum ducimus esse est facilis maxime sed, totam! Dignissimos
                            dolore eligendi eos ex facilis neque quod ratione totam ut. A alias amet animi architecto
                            corporis deserunt dignissimos dolore doloremque fuga impedit in, mollitia necessitatibus
                            nostrum possimus quasi quia ratione, reiciendis similique velit voluptas? Animi at corporis
                            culpa, distinctio fuga hic impedit labore neque nulla numquam odio optio praesentium quaerat
                            sapiente sed? Alias, dolorem doloremque dolorum ducimus et fugit harum incidunt laudantium
                            libero maiores necessitatibus nemo nostrum obcaecati quas quasi rem sapiente sint tempora
                            tenetur, ut? Ad asperiores debitis doloribus eligendi error fugiat ipsa itaque, laudantium
                            nulla numquam obcaecati odio quis quos sit soluta ut veritatis. Aliquid, amet atque
                            doloribus facilis inventore iusto, nemo odio officiis quo repellendus reprehenderit
                            similique suscipit, voluptatum! Amet animi aperiam asperiores assumenda at consequuntur
                            deserunt dicta distinctio dolores earum eius est excepturi fuga hic ipsa iure laborum
                            laudantium magnam minus nemo nihil, odit omnis pariatur perspiciatis porro qui quos
                            recusandae reiciendis tempora tempore totam velit.
                        </div>
                    </div>
                    <div class="tab-pane" id="message-2" role="tabpanel">
                        <div class="btn-group mb-4" role="group" aria-label="First group">
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-reply"></i> Répondre</button>
                        </div>
                        <div style="overflow: auto; max-height: 600px">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi consectetur debitis
                            deserunt, ea enim eveniet, maiores mollitia nostrum optio quisquam sapiente sint sit
                            tempore, totam velit voluptate? Delectus earum natus rem saepe. A assumenda atque beatae
                            blanditiis culpa, dicta esse explicabo fugit harum illo ipsam maiores minima, mollitia neque
                            obcaecati officiis possimus quae quasi quia quisquam sint tenetur totam velit vitae
                            voluptatem. Consequatur debitis earum eius enim facere fuga harum laboriosam minus nesciunt
                            nobis nostrum quaerat quis quisquam repudiandae, sapiente tempora, temporibus ut veniam vero
                            voluptates? Commodi dolore enim fugiat in labore non, nulla odio pariatur possimus suscipit.
                            Laudantium.
                        </div>
                    </div>
                    <div class="tab-pane" id="message-3" role="tabpanel">
                        <div class="btn-group mb-4" role="group" aria-label="First group">
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-reply"></i> Répondre</button>
                        </div>
                        <div style="overflow: auto; height: auto">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aspernatur assumenda blanditiis
                            culpa cum debitis delectus ea eligendi error esse facilis id illo illum ipsum minima
                            molestias nisi nulla, numquam odit, officia omnis perferendis porro possimus quia quibusdam
                            ratione repellat rerum sed sequi similique tempore ullam unde vel velit vero voluptate
                            voluptatibus. Aut beatae deleniti dignissimos, doloremque molestias necessitatibus nesciunt
                            numquam sit vero voluptatibus. Alias architecto aut ea error et, explicabo fugiat illum
                            ipsam ipsum laboriosam maxime minima pariatur quis sapiente sunt tempora voluptatibus
                            voluptatum? A assumenda culpa delectus dolore earum, fugit harum inventore labore nobis quis
                            recusandae reiciendis repellat, sequi tempora totam ullam velit veritatis vero. Adipisci
                            amet aspernatur atque consequatur consequuntur corporis deserunt doloribus est et, fuga in
                            labore, minima natus numquam pariatur quidem quos sequi vero voluptatibus voluptatum.
                            Accusamus ad aliquam architecto assumenda commodi corporis cum dolores eius eligendi esse,
                            fuga, id illo ipsa iure laudantium minus neque odio perferendis possimus quidem quod,
                            ratione sed soluta ullam ut voluptatibus voluptatum! Accusantium aliquam consectetur
                            consequuntur cumque debitis deleniti doloremque dolores eaque esse est exercitationem
                            facilis fuga illo ipsam itaque molestias nam, nemo nulla, numquam obcaecati perferendis
                            praesentium quaerat quam quasi qui quod quos rerum sint tempora tempore temporibus ut
                            veritatis voluptas! Autem doloribus in nostrum sapiente unde. Enim explicabo maiores nostrum
                            recusandae velit? Aliquid laboriosam, placeat provident quo repellendus repudiandae vitae?
                            Ad aliquam autem blanditiis cupiditate delectus dicta dolorem et hic impedit iste iusto
                            molestiae nisi nobis, numquam ratione rem reprehenderit saepe, sed totam voluptatum? Ab
                            debitis expedita fuga inventore ipsam iusto molestiae neque reiciendis? Architecto aut autem
                            deserunt dolore esse eveniet harum iste laboriosam, nihil nobis porro, quasi ratione
                            repellat, repellendus ullam? Ad assumenda doloremque dolores inventore libero magni,
                            molestias nihil officiis quod sed? Eum, nobis, quae! Amet dignissimos dolor explicabo libero
                            nesciunt nisi odit pariatur quidem!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New message modal -->
    <div class="modal fade" id="newMessageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-feather-alt"></i> Nouveau message
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient">Destinataire</label>
                            <select name="recipient" id="recipient" class="custom-select" required>
                                <option value="" disabled selected hidden>- Sélectionnez un destinataire -</option>
                                <option value="">User 1</option>
                                <option value="">User 2</option>
                                <option value="">User 3</option>
                                <option value="">User 4</option>
                            </select>
                            <div class="invalid-feedback">
                                Veuillez choisir un destinataire.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Sujet</label>
                            <input type="text" id="subject" name="subject" class="form-control" required>
                            <div class="invalid-feedback">
                                Veuillez entrer un sujet pour votre message.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content">Message</label>
                            <textarea id="content" name="content" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary"><i class="fa fa-broom"></i> Effacer</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
<?php

include '../parts/footer.php';