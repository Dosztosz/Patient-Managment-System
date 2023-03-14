<style>

  #escape{
    cursor: pointer;
    color: white;
  }
  
  </style>

<script>
  function Hide(){
    $( "#toggle" ).toggle( "hide" );

}
</script>

<div id="toggle">
  <div class="bg-danger d-flex p-2 justify-content-between">
      <h2>Usunąłeś Pacjenta</h2>
      <p id="escape" onclick="Hide()">X</p>
  </div>
</div>
