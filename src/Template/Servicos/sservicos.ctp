<script>

$('.c-servico').click(function(ev){
        var el = ev.target;
        var valor = el.getAttribute('valor');
        $('#f-servico').val(valor);
        $('#s-servico-result').html('');
        console.log($('#f-servico').val());
        var desc = $(el).text();
        $('#s-servico').val(desc);
    });

</script>

<div id="s-servico-result" class="card result" style="width: 30rem;">
    <ul class="list-group list-group-flush">
        <?php foreach($ajax as $a): ?>
        <li class="list-group-item c-servico" valor="<?= $a->id ?>"><?= $a->descricao ?></li>
        <?php endforeach ?>
    </ul>
</div>