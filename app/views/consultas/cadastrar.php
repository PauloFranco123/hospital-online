<div class="wrapper">
  <?=Sessao::mensagem('usuario');?>
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Marque uma consulta</h2>
        </div>

        <form name="cadastrar" method="POST" action="<?=URL?>/consultas/cadastrar" class="php-email-form">

          <div class="row">

            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" name="email_alternative" id="email_alternative" placeholder="Your Email" class="form-control <?=$dados['email_erro'] ? 'is-invalid' : ''?>" value="<?=$dados['email_alternative']?>">
              <div class="invalid-feedback"><?= $dados['email_erro'] ? $dados['email_erro'] :''?></div>
            </div>

            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" name="phone_alternative" id="phone_alternative" placeholder="Your Phone" class="form-control <?=$dados['telefone_erro'] ? 'is-invalid' : ''?>" value="<?=$dados['phone_alternative']?>">
              <div class="invalid-feedback"><?= $dados['telefone_erro'] ? $dados['telefone_erro'] : ''?></div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="datetime" name="data_evento" id="data_evento" placeholder="Appointment Date" data-rule="minlen:4"value="<?= $dados['data_evento']?>" class="form-control datepicker <?=$dados['data_erro'] ? 'is-invalid' : '' ?>" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="invalid-feedback"><?= $dados['data_erro'] ? $dados['data_erro'] : '' ?></div>
            </div>

          <div class="row">
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <textarea name="texto_alternative" id="texto_alternative" class="form-control"><?= $dados['texto_alternative']?></textarea>
              <div class="invalid-feedback"></div>
            </div>


            <div class="col-md-4 form-group mt-3 mt-md-0">
              <select name="especialidade" id="especialidade" class="form-select <?=$dados['especialidade_erro'] ? $dados['especialidade_erro'] : ''?>">
                <option value="<?= $dados['especialidade']=' ' ?>">Selecione a Especialidade </option>
                <option value="<?= $dados['especialidade'] ? $dados['especialidade'] : $dados['especialidade'] = 'Dermatologia'?>"> Dermatologia</option>
                <option value="<?= $dados['especialidade'] ? $dados['especialidade'] = 'Oftamologia' : ''?>">Oftamologia</option>
                <option value="<?= $dados['especialidade'] ? $dados['especialidade'] = 'Cardiologia' : ''?>">Cardiologia</option>
                <option value="<?= $dados['especialidade'] ? $dados['especialidade'] = 'Clínica Dentária' : ''?>">Clínica Dentária</option>
                <option value="<?= $dados['especialidade'] ? $dados['especialidade'] = 'Clínica geral' : ''?>">Clínica geral</option>
              </select>
              <div class="invalid-feedback"><?=$dados['especialidade_erro'] ? $dados['especialidade_erro'] : ''?></div>
            </div>
           
          </div>
          <div class="text-center"><button class="button" type="submit">Marque uma consulta</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->
</div>