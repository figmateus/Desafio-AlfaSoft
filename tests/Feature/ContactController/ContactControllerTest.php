<?php

namespace ContactController;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use function Tests\Feature\factory;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_create_contact()
    {
        //prepare
        $this->withoutMiddleware(VerifyCsrfToken::class);
        $contact = Contact::factory()->make()->toArray();
        $user = User::factory()->create();
        $this->actingAs($user);

        //act
        $response = $this->post('/contacts/contacts',$contact);

        //assert
        $this->assertDatabaseHas(Contact::class, $contact);
        $response->assertStatus(302);
    }

    public function test_user_can_edit_contact()
    {
        //prepare
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $contact = Contact::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

        $contactBeforeUpdate = [
            'name' => 'test edit contact',
            'contact' => '123456789',
            'email' => 'testemail@gmail.com',
        ];
        //act
        $response = $this->put('/contacts/'.$contact->id.'/edit',$contactBeforeUpdate);
        //assert
        $contactAfterUpdate = Contact::find($contact->id);
        $this->assertNotNull($contactAfterUpdate);
        $this->assertEquals($contactBeforeUpdate, $contactAfterUpdate->only(['name','contact','email']));
        $response->assertStatus(302);

    }

    public function test_user_can_delete_contact()
    {
        //prepare
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(VerifyCsrfToken::class);
        $contact = Contact::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

        //act
        $response = $this->delete('contacts/'.$contact->id);
        //assert
        $this->assertSoftDeleted($contact);
        $response->assertStatus(302);

    }

    public function test_user_cannot_create_contact_with_missing_fields()
    {
        //prepare
        $this->withoutMiddleware(VerifyCsrfToken::class);
        $user = User::factory()->create();
        $this->actingAs($user);

        $contact = [
            'name' => 'test',
            'contact' => '123456789',
            'email' => '',
        ];
        //act
        $response = $this->post('contacts/contacts', $contact)
            ->assertSessionHasErrors(['name','email']);

        //assert
        $this->assertDatabaseMissing('contacts',[
            'name' => 'test',
            'contact' => '123456789',
            'email' => '',
        ]);
    }
}
