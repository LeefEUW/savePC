<?
class Contact{
    // Attributs 
    private ?int $id_contact;
    private ?string $objet_contact;
    private ?string $date_contact;
    private ?string $nom_contact;
    private ?string $prenom_contact;
    private ?string $mail_contact;
    private ?string $entreprise_contact;
    /* Foreign Key */
    private ?int $id_type_demande;

    // constructor

    public function __construct()
    {}
}
?>