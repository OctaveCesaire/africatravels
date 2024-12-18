<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tableau De Bord') }}
        </h2>
    </x-slot>
    <div class="container-fluid py-4">
        <div class="mt-2 row">
            <div class="col-lg-7 position-relative z-index-2">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="card-body p-3">
                        <!-- Section graphique -->
                        <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                            <div class="chart">
                                <canvas id="transactionChart" class="chart-canvas" height="170" title="Graphe des ventes par mois"></canvas>
                            </div>
                        </div>
                
                        <!-- Titre et description -->
                        <h6 class="ms-2 mt-4 mb-0">Statistque des activités & transaction</h6>
                        <p class="text-sm ms-2 opacity-70">(<span class="font-weight-bolder">Depuis l'ouverture</span>)</p>
                
                        <!-- Stats section -->
                        <div class="container">
                            <div class="row">
                                <!-- Stat 1: Users -->
                                <div class="col-3 py-3">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                            <!-- Users Icon -->
                                            <svg width="10px" height="10px" viewBox="0 0 40 44" xmlns="http://www.w3.org/2000/svg">
                                                <title>Chiffre d'affaire du jour</title>
                                                <g fill="#FFFFFF">
                                                    <path d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.6"></path>
                                                    <path d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z" opacity="0.6"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">Aujourd'hui</p>
                                    </div>
                                    <h4 class="font-weight-bolder">36K XOF</h4>
                                    {{-- <div class="progress w-75">
                                        <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                
                                <!-- Stat 2: Clicks -->
                                <div class="col-3 py-3">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                                            <!-- Clicks Icon -->
                                            <svg width="10px" height="10px" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                                <title>Chiffre d'affaire issue des activité depuis l'ouverture</title>
                                                <g fill="#FFFFFF">
                                                    <path d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z" opacity="0.6"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">Vente Total</p>
                                    </div>
                                    <h4 class="font-weight-bolder">200K XOF</h4>
                                </div>
                
                                <!-- Stat 3: Sales -->
                                <div class="col-3 py-3">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                                            <!-- Sales Icon -->
                                            <svg width="10px" height="10px" viewBox="0 0 43 36" xmlns="http://www.w3.org/2000/svg">
                                                <title>Note de l'entreprise</title>
                                                <g fill="#FFFFFF">
                                                    <path d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.6"></path>
                                                    <path d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z" opacity="0.6"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">Note</p>
                                    </div>
                                    <h4 class="font-weight-bolder">4.5 ***** </h4>
                                </div>
                
                                <!-- Stat 4: Items -->
                                <div class="col-3 py-3">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                                            <!-- Items Icon -->
                                            <svg width="10px" height="10px" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                                <title>Nombre total de client</title>
                                                <g fill="#FFFFFF">
                                                    <path d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.48,28.48 C29.4875,27.9983333 29.5,27.5066667 29.5,27 L29.5,14 C29.5,13.4933333 29.4875,12.9983333 29.48,12.5066667 L22.4116667,19.0066667 L28.48,12.245 C28.9866667,12.3033333 29.4916667,12.3333333 30,12.3333333 C30.53,12.3333333 31.0516667,12.2933333 31.5666667,12.2333333" opacity="0.6"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">Client Total</p>
                                    </div>
                                    <h4 class="font-weight-bolder">70K</h4>
                                    {{-- <div class="progress w-75">
                                        <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <div class="card shadow-lg border-0 rounded-3">
                            <div class="card-header pb-0 p-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="my-auto text-primary">Notes & Avis</h6>
                                    <span class="my-auto text-muted"> < | > </span>
                                </div>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table table-bordered table-hover align-items-center">
                                    <thead class="text-primary">
                                        <tr>
                                            <th class="text-uppercase text-xs font-weight-bolder">Ville</th>
                                            <th class="text-uppercase text-xs font-weight-bolder text-center">Note</th>
                                            <th class="text-uppercase text-xs font-weight-bolder text-center">Événement</th>
                                            <th class="text-uppercase text-xs font-weight-bolder text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Exemple d'élément de tableau -->
                                        <tr>
                                            <td class="w-30">
                                                <div class="d-flex px-2 py-1 align-items-center">
                                                    <div class="w-50">
                                                        <img src="{{ asset('assets/flag/US.webp') }}" alt="Country flag" class="img-fluid rounded">
                                                    </div>
                                                    <div class="ms-4 text-sm mb-0">
                                                        Abomey-Calavi
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                4.5
                                            </td>
                                            <td class="text-center">
                                                Événement
                                            </td>
                                            <td class="text-center">
                                                <i class="ni ni-zoom-split-in btn-xs btn-outline-primary" data-id="1"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-5">
                {{--  --}}
                                     
                <div id="globe" class="position-absolute end-0 top-5 ">
                    <canvas width="700" height="600" class="w-100 h-100 me-lg-0 me-n10 mt-lg-5"></canvas>
                </div>
                {{--  --}}
                <div class="card mt-3 shadow-lg mt-lg-9 z-index-2 border-0 rounded-3">
                    <div class="card-body p-3">
                        <!-- Section graphique -->
                        <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170" title="Graphe des ventes par mois"></canvas>
                            </div>
                        </div>
                
                        <!-- Titre et description -->
                        <h6 class="ms-2 mt-4 mb-0">Active Users</h6>
                        <p class="text-sm ms-2 opacity-70">(<span class="font-weight-bolder">+23%</span>) than last week</p>
                
                        <!-- Stats section -->
                        <div class="container">
                            <div class="row">
                                <!-- Stat 1: Users -->
                                <div class="col-3 py-3">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                            <!-- Users Icon -->
                                            <svg width="10px" height="10px" viewBox="0 0 40 44" xmlns="http://www.w3.org/2000/svg">
                                                <title>users</title>
                                                <g fill="#FFFFFF">
                                                    <path d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.6"></path>
                                                    <path d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z" opacity="0.6"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">Users</p>
                                    </div>
                                    <h4 class="font-weight-bolder">36K</h4>
                                    <div class="progress w-75">
                                        <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                
                                <!-- Stat 2: Clicks -->
                                <div class="col-3 py-3">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                                            <!-- Clicks Icon -->
                                            <svg width="10px" height="10px" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                                <title>clicks</title>
                                                <g fill="#FFFFFF">
                                                    <path d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z" opacity="0.6"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">Clicks</p>
                                    </div>
                                    <h4 class="font-weight-bolder">2m</h4>
                                    <div class="progress w-75">
                                        <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                
                                <!-- Stat 3: Sales -->
                                <div class="col-3 py-3">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                                            <!-- Sales Icon -->
                                            <svg width="10px" height="10px" viewBox="0 0 43 36" xmlns="http://www.w3.org/2000/svg">
                                                <title>sales</title>
                                                <g fill="#FFFFFF">
                                                    <path d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.6"></path>
                                                    <path d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z" opacity="0.6"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">Sales</p>
                                    </div>
                                    <h4 class="font-weight-bolder">435$</h4>
                                    <div class="progress w-75">
                                        <div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                
                                <!-- Stat 4: Items -->
                                <div class="col-3 py-3">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                                            <!-- Items Icon -->
                                            <svg width="10px" height="10px" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                                <title>items</title>
                                                <g fill="#FFFFFF">
                                                    <path d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.48,28.48 C29.4875,27.9983333 29.5,27.5066667 29.5,27 L29.5,14 C29.5,13.4933333 29.4875,12.9983333 29.48,12.5066667 L22.4116667,19.0066667 L28.48,12.245 C28.9866667,12.3033333 29.4916667,12.3333333 30,12.3333333 C30.53,12.3333333 31.0516667,12.2933333 31.5666667,12.2333333" opacity="0.6"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">Items</p>
                                    </div>
                                    <h4 class="font-weight-bolder">70K</h4>
                                    <div class="progress w-75">
                                        <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @push('js')
        
        <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/chartjs.min.js"></script>
        <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/threejs.js"></script>
        <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/orbit-controls.js"></script>
      
        <script>
            $(document).on('click', '.ni', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/api/avis/' + id,  // Correction de l'URL
                    type: 'GET',
                    success: function(response) {
                        swal({
                            title: "Avis du Client",
                            content: {
                                element: 'div',
                                attributes:{
                                innerHTML: `
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-4">Nom : <strong class="text-sm">${response.nom}</strong></div>
                                                <div class="col-4">Pour : <strong class="text-sm">${response.event}</strong></div>
                                                <div class="col-4">Note : <strong class="text-sm">${response.note}</strong></div>
                                            </div>
                                        </div>
                                        <div class="alert">
                                            <p class="mt-2"> ${response.avis}</p>
                                        </div>
                                    </div>`
                                }
                            }
                        });
                    },
                    error: function() {
                        swal("Erreur", "Impossible de récupérer l'avis.", "error");
                    }
                });
            });
            // A modifier selon les donnée
            var ctx = document.getElementById("chart-bars").getContext("2d");
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        },
                        ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 15,
                        font: {
                            size: 14,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false
                        },
                        ticks: {
                        display: false
                        },
                    },
                    },
                },
            });
            // Graphique des transaction Issue du code de Mariel
            const ctx = document.getElementById('transactionChart').getContext('2d');
            const chartData = @json($chartData);
            const labels = chartData.map(data => data.label);
            const values = chartData.map(data => data.value);

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107']
                    }]
                }
            });

            (function() {
                const container = document.getElementById("globe");
                const canvas = container.getElementsByTagName("canvas")[0];

                const globeRadius = 100;
                const globeWidth = 4098 / 2;
                const globeHeight = 1968 / 2;

                function convertFlatCoordsToSphereCoords(x, y) {
                    let latitude = ((x - globeWidth) / globeWidth) * -180;
                    let longitude = ((y - globeHeight) / globeHeight) * -90;
                    latitude = (latitude * Math.PI) / 180;
                    longitude = (longitude * Math.PI) / 180;
                    const radius = Math.cos(longitude) * globeRadius;

                    return {
                    x: Math.cos(latitude) * radius,
                    y: Math.sin(longitude) * globeRadius,
                    z: Math.sin(latitude) * radius
                    };
                }

                function makeMagic(points) {
                    const {
                    width,
                    height
                    } = container.getBoundingClientRect();

                    // 1. Setup scene
                    const scene = new THREE.Scene();
                    // 2. Setup camera
                    const camera = new THREE.PerspectiveCamera(45, width / height);
                    // 3. Setup renderer
                    const renderer = new THREE.WebGLRenderer({
                    canvas,
                    antialias: true
                    });
                    renderer.setSize(width, height);
                    // 4. Add points to canvas
                    // - Single geometry to contain all points.
                    const mergedGeometry = new THREE.Geometry();
                    // - Material that the dots will be made of.
                    const pointGeometry = new THREE.SphereGeometry(0.5, 1, 1);
                    const pointMaterial = new THREE.MeshBasicMaterial({
                    color: "#989db5",
                    });

                    for (let point of points) {
                    const {
                        x,
                        y,
                        z
                    } = convertFlatCoordsToSphereCoords(
                        point.x,
                        point.y,
                        width,
                        height
                    );

                    if (x && y && z) {
                        pointGeometry.translate(x, y, z);
                        mergedGeometry.merge(pointGeometry);
                        pointGeometry.translate(-x, -y, -z);
                    }
                    }

                    const globeShape = new THREE.Mesh(mergedGeometry, pointMaterial);
                    scene.add(globeShape);

                    container.classList.add("peekaboo");

                    // Setup orbital controls
                    camera.orbitControls = new THREE.OrbitControls(camera, canvas);
                    camera.orbitControls.enableKeys = false;
                    camera.orbitControls.enablePan = false;
                    camera.orbitControls.enableZoom = false;
                    camera.orbitControls.enableDamping = false;
                    camera.orbitControls.enableRotate = true;
                    camera.orbitControls.autoRotate = true;
                    camera.position.z = -265;

                    function animate() {
                    // orbitControls.autoRotate is enabled so orbitControls.update
                    // must be called inside animation loop.
                    camera.orbitControls.update();
                    requestAnimationFrame(animate);
                    renderer.render(scene, camera);
                    }
                    animate();
                }

                function hasWebGL() {
                    const gl =
                    canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
                    if (gl && gl instanceof WebGLRenderingContext) {
                    return true;
                    } else {
                    return false;
                    }
                }

                function init() {
                    if (hasWebGL()) {
                    window
                    window.fetch("https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard-pro/assets/js/points.json")
                        .then(response => response.json())
                        .then(data => {
                        makeMagic(data.points);
                        });
                    }
                }
                init();
            })();
  


        </script>
    @endpush
</x-app-layout>
