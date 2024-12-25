<div class="container">
    <!-- Conteneur avec centrage et bord arrondi -->
    <div class="w-50 mx-auto rounded-lg overflow-hidden text-center">
        <!-- Canvas avec effet d'ombre et bords arrondis -->
        <canvas id="transactionChart" class="rounded-3"></canvas>
    </div>
</div>

<!-- Inclusion de la bibliothèque Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Initialisation du graphique
    const ctx = document.getElementById('transactionChart').getContext('2d');
    const chartData = @json($chartData);  // Les données du graphique passées depuis la vue
    const labels = chartData.map(data => data.label); // Labels pour les sections du graphique
    const values = chartData.map(data => data.value); // Valeurs correspondant aux labels

    // Création du graphique
    new Chart(ctx, {
        type: 'pie', // Type de graphique : "pie" pour un graphique circulaire
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107'], // Couleurs des sections du graphique
                borderColor: '#ffffff', // Couleur de la bordure entre chaque section
                borderWidth: 2 // Épaisseur de la bordure
            }]
        }
    });
</script>

