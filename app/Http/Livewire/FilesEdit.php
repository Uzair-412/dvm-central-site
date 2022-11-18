<?php

namespace App\Http\Livewire;

use App\Models\EvFile;
use Livewire\Component;
use Livewire\WithFileUploads;

class FilesEdit extends Component
{
    use WithFileUploads;

    public $exhibitor_data, $mode = 'add';
    public $document, $type, $link, $title, $description; // form fields, putting them separate
    public EvFile $file;
    public $allowed_file_types = ['.pdf', '.doc', '.docx', '.ppt', '.pptx'];

    protected $listeners = ['editFile' => 'edit_file'];

    protected $rules = [
        'type'          => 'required',
        'link'          => 'required_if:type,link',
        'document'      => 'required_if:type,file',//'sometimes|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:5000',
        'title'         => 'required',
        'description'   => 'required',
    ];

    public function render()
    {
        return view('livewire.files-edit');
    }

    public function save()
    {
        $this->validate();

        if($this->document)
        {
            $ext = strtolower(strrchr($this->document->getClientOriginalName(), '.'));
            
            if(!in_array($ext, $this->allowed_file_types))
            {
                session()->flash('error', 'Please upload only PDF Documents or MS Office Files.');
                return;
            }

            $size = $this->document->getSize() / 1024;
            if($size > 10000)
            {
                session()->flash('error', 'File should not be greater than 5,000kb.');
                return;
            }
        }
     
        $data = [   'ev_id' => $this->exhibitor_data->id, 
                    'type' => $this->type, 
                    'title' => $this->title, 
                    'description' => $this->description,
                    'file_name' => $this->link
                ];             

        $file = EvFile::create($data);

        $this->document && $file->update([
            'file_name' => $this->document->store('events/files', 'ds3')
        ]);

        $this->document = $this->type = $this->link = $this->title = $this->description = null;

        $this->notify('Document / Link added!');
        $this->dispatchBrowserEvent('close_sidebar');
        $this->emit('filesUpdated');
    }

    public function edit_file($id)
    {
        echo $id;
    }
}
