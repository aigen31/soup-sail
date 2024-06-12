<?php

namespace App\Livewire\Company;

use App\Http\Controllers\InnController;
use App\Models\User;
use App\Rules\Inn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateCompanyInformationForm extends Component
{
	public $name;

	public $category;

	public $bodies;

	public $body;

	public $site_url;

	public $inn;

	public $responce;

	public function mount()
	{
		$this->name = $this->company->name;
		$this->site_url = $this->company->site_url;
		$this->category = $this->company->category;
		$this->body = $this->company->body;
		$this->inn = $this->company->inn;

		// dd(InnController::getInnResponce($this->company->inn)->items[0]);
	}

	public function getCompanyProperty()
	{
		return Auth::user()->company;
	}

	public function updateCompanyInformation()
	{
		$this->validate([
			'site_url' => [
				'required',
				'url:http,https',
				Rule::unique('companies', 'site_url')->ignore($this->company->id)
			],
			'inn' => [
				'required',
				new Inn
			]
		]);
		
		$this->responce = InnController::getInnResponce($this->inn)->items[0]->{'ЮЛ'};

		$this->company->name = $this->responce->{'НаимСокрЮЛ'};
		$this->company->body = $this->responce->{'ОКОПФ'};
		$this->company->category = $this->responce->{'ОснВидДеят'}->{'Текст'};
		$this->company->site_url = $this->site_url;
		$this->company->inn = $this->inn;

		$this->company->save();

		$this->dispatch('saved');
	}

	public function render()
	{
		return view('livewire.company.update-company-information-form');
	}
}
