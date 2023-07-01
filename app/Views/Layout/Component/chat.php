<div class="ngambang">

  <div class="collapse" id="collapseExample">
    <div class="card" style="width: 25rem;">
      <div class="card-header">
        <?php $contact = setting()->get('aplikasi.contact') ?>

        <?= isset($contact['mail']) ? '<a class="btn p-0 m-1  " href="mailto:' . $contact['mail'] . '" role="button"> <i class="zoom fa-solid fa-envelope  fa-lg"></i></a>' : '' ?>

        <!-- wa -->
        <?= isset($contact['wa']) ? '<a  target="_blank" class="btn p-0 m-1  " href="' . linkwa($contact['wa']). '" role="button"><i class="zoom fa-brands fa-whatsapp fa-bounce fa-lg" style="color: #008000;"></i></a>' : '' ?>

      </div>
      <div class="card-body">


        <div id="messagesh">

        </div>
        <div class="row mb-3" id="messages" >

        </div>
      </div>
    </div>
  </div>
  <button class="float-end btn text-black btn-primary bt-chat" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Let’s Chat!
  </button>
</div>



<script>
  const array = JSON.parse('<?= json_encode(setting('Aplikasi.chat')) ?>');
  /*   [{
       'tanya': 'berap1a?',
       'jawap': 'karena1'
     },
     {
       'tanya': 'berapa2?',
       'jawap': 'karena2'
     },
     {
       'tanya': 'berapa3?',
       'jawap': 'karena3'
     }
   ]; */
  tampil();

  function tampil() {
    for (var i = 0; i < array.length; i++) {
      g = '<button type="button" onclick="balas(' + i + ')" class="btn m-1 btn-primary btn-sm">' + array[i].tanya + '</button>';
      $("#messagesh").append(g);
    }
  }

  function balas(index) {
    g = '<div class="col-12">  <button class="btn btn-outline-secondary float-end my-2">' + array[index].tanya + '</button></div>';
    g += '<div class="col-3" ><h1>🦸</h1> </div><div class="col-7"><p class=""> ' + array[index].jawap + '</p></div>';
    //   g='<button type="button" onclick="balas('+i+')" class="btn m-1 btn-primary btn-sm">'+array[i].tanya+'</button>';
    $("#messages").append(g);
  }
</script>