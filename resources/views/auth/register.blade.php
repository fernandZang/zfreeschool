
<div class="container pb-3">
    <div class="row justify-content-end">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-olive">{{ __('demande d\'inscription') }}</div>

                <div class="card-body">
                    <form id="register" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}"  autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}"  autocomplete="prenom" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_n" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>
                            <div class="col-6">
                                <input class="form-control" type="date" value="2011-08-19" name="date_n" id="date_n">                           
                            </div>
                        </div>

                        <div class="form-group row">
                            <legend class="col-form-legend col-md-4 col-form-label text-md-right">{{ __('Sexe') }}</legend>
                            
                            <div class="col-3 text-md-right">                                
                                <label for="sexe_m" class="col-form-label">
                                    <input class="form-check-input" type="radio" name="sexe" id="sexe_m" value="masculin" checked>                                
                                    {{ __('Masculin') }}
                                </label> 
                            </div>
                            <div class="col-3 text-md-right">                                 
                                <label for="sexe_f" class="col-form-label">
                                    <input class="form-check-input" type="radio" name="sexe" id="sexe_f" value="feminin">                                
                                    {{ __('Feminin') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="poste" class="col-md-4 col-form-label text-md-right">{{ __('vous postulez pour être ') }}</label>
                            <div class="col-md-6">
                                <select class="form-control " id="poste" name="poste">
                                    <option selected>{{ __('Elève') }}</option>
                                    <option>{{ __('Enseignant') }}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="emailR" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            
                            <div class="col-6">
                                <input id="emailR" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('mot de passe') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row poste-el">
                            <label for="niveau_id" class="col-md-4 col-form-label text-md-right">{{ __('votre niveau') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="niveau_id" name="niveau_id">
                                    @foreach ($niveaux as $niveau)
                                        <option value="{{ __($niveau->id) }}">{{ __($niveau->nom) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row poste-en">
                            <label for="matiere_id" class="col-md-4 col-form-label text-md-right">{{ __('Matiere ') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="matiere_id" name="matiere_id">
                                    @foreach ($matieres as $matiere)
                                        <option value="{{ __($matiere->id) }}">{{ __($matiere->nom) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0 vrai-btn">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('s\'enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
