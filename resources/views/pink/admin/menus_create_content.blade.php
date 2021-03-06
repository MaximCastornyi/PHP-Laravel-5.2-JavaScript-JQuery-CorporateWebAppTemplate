<div id="content-page" class="content group">
				            <div class="hentry group">

{!! Form::open(['url' => (isset($menu->id)) ? route('admin.menus.update',['menus'=>$menu->id]) : route('admin.menus.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<ul>

		<li class="text-field">
			<label for="name-contact-us">
				<span class="label">Title:</span>
				<br />
				<span class="sublabel">Title</span><br />
			</label>
			<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
			{!! Form::text('title',isset($menu->title) ? $menu->title  : old('title'), ['placeholder'=>'Add page`s title']) !!}
			 </div>
		 </li>


		<li class="text-field">
			<label for="name-contact-us">
				<span class="label">Parent adding for article:</span>
				<br />
				<span class="sublabel">Parent:</span><br />
			</label>
			<div class="input-prepend">
				{!! Form::select('parent', $menus, isset($menu->parent) ? $menu->parent : null) !!}
			 </div>

		</li>
	</ul>

		<h1">Тип меню:</h1>

		<div id="accordion">

		<h3>{!! Form::radio('type', 'customLink',(isset($type) && $type == 'customLink') ? TRUE : FALSE,['class' => 'radioMenu']) !!}
			<span class="label">Link of user:</span></h3>

			<ul>

				<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Path to link:</span>
						<br />
						<span class="sublabel">Path to link</span><br />
					</label>
					<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('custom_link',(isset($menu->path) && $type=='customLink') ? $menu->path  : old('custom_link'), ['placeholder'=>'Add page`s name']) !!}
					 </div>
				</li>
			<div style="clear: both;"></div>
			</ul>


			<h3>{!! Form::radio('type', 'blogLink',(isset($type) && $type == 'blogLink') ? TRUE : FALSE,['class' => 'radioMenu']) !!}
			<span class="label">Part of blog:</span></h3>

			<ul>

				<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Link to blog`s category:</span>
						<br />
						<span class="sublabel">Link to blog`s category</span><br />
					</label>
					<div class="input-prepend">

						@if($categories)
						{!! Form::select('category_alias',$categories,(isset($option) && $option) ? $option :FALSE) !!}
						@endif
					</div>
				</li>


				<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Link to blog`s material:</span>
						<br />
						<span class="sublabel">Link to blog`s material</span><br />
					</label>
					<div class="input-prepend">
					{!! Form::select('article_alias', $articles, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not used']) !!}

					</div>

				</li>
			<div style="clear: both;"></div>
			</ul>



			<h3>{!! Form::radio('type', 'portfolioLink',(isset($type) && $type == 'portfolioLink') ? TRUE : FALSE,['class' => 'radioMenu']) !!}
			<span class="label">Category for portfolio:</span></h3>

			<ul>

				<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Link for portfolio:</span>
						<br />
						<span class="sublabel">Link for portfolio</span><br />
					</label>
					<div class="input-prepend">
					{!! Form::select('portfolio_alias', $portfolios, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not used']) !!}

					</div>

				</li>

				<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Portfolio:</span>
						<br />
						<span class="sublabel">Portfolio</span><br />
					</label>
					<div class="input-prepend">
					{!! Form::select('filter_alias', $filters, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not used']) !!}

					</div>

				</li>


			</ul>



		</div>

		<br />

		@if(isset($menu->id))
			<input type="hidden" name="_method" value="PUT">

		@endif
		<ul>
			<li class="submit-button">
						{!! Form::button('Save', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
			</li>
		</ul>







{!! Form::close() !!}


</div>
</div>

<script>

	jQuery(function($) {

		$('#accordion').accordion({

			activate: function(e, obj) {
				obj.newPanel.prev().find('input[type=radio]').attr('checked','checked');
			}

		});

		var active = 0;
		$('#accordion input[type=radio]').each(function(ind,it) {

			if($(this).prop('checked')) {
				active = ind;
			}

		});

		$('#accordion').accordion('option','active', active);

	})

</script>