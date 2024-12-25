<div class="card-body p-3">
    <!-- Section graphique -->
    <div {{$attributes->merge(['class'=>"border-radius-lg py-3 pe-1 mb-3"])}}>
        <div class="chart">
            <canvas id="" class="chart-canvas" height="170" title="Graphe des ventes par mois"></canvas>
        </div>
    </div>

    <!-- Titre et description -->
    <h6 class="ms-2 mt-4 mb-0">Statistque des activités & transaction</h6>
    <p class="text-sm ms-2 opacity-70">(<span class="fw-bolder">Depuis l'ouverture</span>)</p>

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
                    <p class="text-xs mt-1 mb-0 fw-bold">Aujourd'hui</p>
                </div>
                <h4 class="fw-bolder">36K XOF</h4>
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
                    <p class="text-xs mt-1 mb-0 fw-bold">Vente Total</p>
                </div>
                <h4 class="fw-bolder">200K XOF</h4>
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
                    <p class="text-xs mt-1 mb-0 fw-bold">Note</p>
                </div>
                <h4 class="fw-bolder">4.5 ***** </h4>
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
                    <p class="text-xs mt-1 mb-0 fw-bold">Client Total</p>
                </div>
                <h4 class="fw-bolder">70K</h4>
            </div>
        </div>
    </div>
</div>
