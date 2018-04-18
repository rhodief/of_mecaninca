<div class="home-conteiner">
<?= $this->Form->create(null, ['class'=> 'form-signin', 'url'=>['controller'=>'funcionarios', 'action'=>'login']]) ?>
      <div class="text-center mb-4">
        
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <p>Entre com suas Credenciais</p>
        <p>Se você for um atendente, usar a sigla ATD juntamente com sua matrícula. Se for Técnico, usar TEC juntamente com sua matrícula</p>
      </div>

      <div class="form-label-group">
        <?= $this->Form->text('matricula', ['id'=>'matricula-id', 'class'=>'form-control', 'required', 'autofocus', 'placeholder'=>'Matrícula']) ?>
        <label for="inputEmail">Matrícula</label>
      </div>

      <div class="form-label-group">
        <?= $this->Form->password('senha', ['id'=>'inputPassword', 'class'=>'form-control', 'required', 'placeholder'=>'Senha']) ?>
        <label for="inputPassword">Senha</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Manter Conectado
        </label>
      </div>
      <?= $this->Form->button(__('Entrar'), ['class'=>'btn btn-lg btn-primary btn-block']) ?>
      <p class="mt-5 mb-3 text-muted text-center">&copy; ADS 5º Semestre - Unopar 2018. Todos os Direitos Reservados <i class="fas fa-smile"></i></p>
      <?= $this->Form->end() ?>
</div>