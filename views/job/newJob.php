<section class="section-sm container-sm header-section-dashboard">
  <h2>Crea un nuevo trabajo</h2>
</section>

<section class="section-sm container-sm">
  <form method="POST" action="" class="form bx-shadow">
    <h1>Complete el formulario</h1>
    <?php include_once __DIR__ . '/../templates/alerts.php'?>
    <div class="field-group">
      <input
      autofocus
      type="text"
      name="title"
      title="Título"
      id="title"
      placeholder="Ingrese el título">
    </div>

    <div class="field-group">
      <textarea 
      name="description" 
      id="description"
      placeholder="Descripción del trabajo"
      ></textarea>
    </div>

    <div class="field-group">
      <input
      type="number"
      name="salary"
      title="Salario"
      id="salary"
      placeholder="Ingresa el salario">
    </div>

    <div class="field-group">
      <input
      class="button-submit"
      type="submit"
      value="CREAR TRABAJO">
    </div>
  </form>
</section>