<script>

$('.c-peca').click(function(ev){
        var el = ev.target;
        var valor = el.getAttribute('valor');
        $('#f-peca').val(valor);
        $('#s-peca-result').html('');
        console.log($('#f-peca').val());
        var desc = $(el).text();
        $('#s-peca').val(desc);
    });

</script>

<div id="s-peca-result" class="card result" style="width: 30rem;">
    <ul class="list-group list-group-flush">
        <?php foreach($ajax as $a): ?>
        <li class="list-group-item c-peca" valor="<?= $a->id ?>"><?= $a->descricao ?></li>
        <?php endforeach ?>
    </ul>
</div>