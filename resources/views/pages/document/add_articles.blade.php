<div data-repeater-list="articles">
    <div data-repeater-item class="row">
        <div class="mb-3 col-lg-3">
            <label for="designation">{{ __('invoice.form.article_designation') }} *</label>
            <input type="text" name="designation" id="designation"
                class="form-control @error('articles.*.designation') is-invalid @enderror" required />
            <hr>
            <textarea name="description" id="description" rows="5"
                class="form-control @error('articles.*.description') is-invalid @enderror"></textarea>
            @error('articles.*.designation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 col-lg-1">
            <label for="price_uni">{{ __('P.U HT') }} *</label>
            <input type="text" name="price_uni" id="price_uni"
                class="form-control @error('articles.*.price_uni') is-invalid @enderror" required />

            @error('price_uni')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 col-lg-1">
            <label for="quantity">{{ __('QTÉ.') }} *</label>
            <input type="text" name="quantity" id="quantity"
                class="form-control @error('articles.*.quantity') is-invalid @enderror" required />
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 col-lg-2">
            <label for="taux_tax">{{ __('TVA') }} *</label>
            <select name="taux_tax" class="form-control select2-templating @error('taux_tax') is-invalid @enderror">

                @foreach ($taxes as $taxe)
                    <option value="{{ $taxe->taux_percent }}">{{ $taxe->taux_percent }}</option>
                @endforeach

            </select>
            @error('taux_tax')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 col-lg-2">
            <label for="remise">{{ __('RÉDUC. HT %') }} </label>
            <input type="number" name="remise" id="remise" value="0" min="0"
                class="form-control @error('articles.*.remise') is-invalid @enderror" />
            @error('remise')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 col-lg-2">
            <label for="price_ht">{{ __('TOTAL HT') }}</label>
            <input type="text" name="price_ht" id="price_ht"
                class="form-control @error('articles.*.price_ht') is-invalid @enderror" readonly />
            @error('price_ht')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 col-lg-1">

            <button data-repeater-delete type="button" class="mt-4 btn btn-danger waves-effect waves-light">
                <i class="fas fa-trash-alt font-size-16"></i>
            </button>

        </div>
    </div>

</div>

<button data-repeater-create type="button" class="btn btn-success waves-effect waves-light">
    <i class="bx bx-add-to-queue font-size-16 align-middle"></i>
    Ajouter une ligne
</button>
