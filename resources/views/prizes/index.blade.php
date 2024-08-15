@extends('partials.template')

@section('content')
<div id="prizes-index_list">
    @include('prizes.partials.index_list', ['prizes' => $prizes])
</div>
@endsection

@section('script-head')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function showUpdatePrizeForm(prizeId) {
            console.log("je test");
            document.getElementById('update-prize-container').style.display = 'block';
            // Charger les données du prix à modifier via AJAX ou une autre méthode
            // Exemple de chargement via un formulaire pré-rempli :
            fetch(`/prizes/${prizeId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('update-prize-form').action = `/prizes/${prizeId}`;
                    document.getElementById('update-prize-id').value = data.id;
                    document.getElementById('update-name').value = data.name;
                    document.getElementById('update-type').value = data.type;
                    document.getElementById('update-campaign_id').value = data.campaign_id;
                });
        }

        function hideUpdatePrizeForm() {
            document.getElementById('update-prize-container').style.display = 'none';
        }

        function submitUpdatePrizeForm(event) {
            event.preventDefault();
            // Soumettre le formulaire de mise à jour
            document.getElementById('update-prize-form').submit();
        }
        function archivePrize(prizeId) {
            axios.post(`/prizes/${prizeId}/archive`, { _method: 'POST' })
                .then(response => {
                    alert('Prize archived successfully!');
                    window.location.reload(); // Recharger la page pour afficher les données mises à jour
                })
                .catch(error => console.error('Error archiving prize:', error));
        }

        function redirectToCreatePrize() {
            window.location.href = "{{ route('prizes.create') }}";
        }

        function redirectToArchivedPrizes() {
            window.location.href = "{{ route('prizes.archived') }}";
        }


        function showCreatePrizeForm() {
            document.querySelector('.overlay').style.display = 'block';
            document.querySelector('.form-container').style.display = 'block';
        }

        function hideCreatePrizeForm() {
            document.querySelector('.overlay').style.display = 'none';
            document.querySelector('.form-container').style.display = 'none';
        }

        function submitPrizeForm(event) {
            event.preventDefault(); // Empêche le rechargement de la page
            const form = event.target;
            axios.post(form.action, new FormData(form))
                .then(response => {
                    alert('Prize created successfully!');
                    window.location.reload(); // Recharger la page pour afficher les nouveaux prix
                })
                .catch(error => console.error('Error creating prize:', error));
        }

        function showArchivedPrizes() {
            axios.get("{{ route('prizes.archived') }}")
                .then(response => {
                    document.querySelector('.archived-prizes').innerHTML = response.data; // Inject archived data
                    document.querySelector('.archived-prizes').style.display = 'block';
                    document.querySelector('.overlay').style.display = 'block';
                })
                .catch(error => console.error('Error loading archived prizes:', error));
        }

        function hideArchivedPrizes() {
            document.querySelector('.archived-prizes').style.display = 'none';
            document.querySelector('.overlay').style.display = 'none';
            document.querySelector('.prizes-list').style.filter = 'none';
        }

        function loadPrizes() {
            axios.get("{{ route('prizes.index') }}")
                .then(response => {
                    document.querySelector('.prizes-list').innerHTML = response.data; // Inject prize data
                    document.querySelector('.prizes-list').style.display = 'block';
                    document.querySelector('.archived-prizes').style.display = 'none';
                })
                .catch(error => console.error('Error loading prizes:', error));
        }

    </script>
    <script>
        function restorePrize(prizeId) {
            fetch(`/prizes/${prizeId}/restore`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Optionnel : Recharger la liste des prix ou mettre à jour l'interface
                        location.reload(); // Recharger la page pour voir les modifications
                    } else {
                        alert('Failed to restore prize.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }


    </script>

@endsection
