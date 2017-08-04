<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

       // $this->call(UsersSeeder::class);
       // $this->call(PostsSeeder::class);
       // $this->call(BoardsSeeder::class);
       // $this->call(CodesSeeder::class);

       //  //  주문관련 Seeder
       // $this->call(BrandsSeeder::class);
       // $this->call(ModelsSeeder::class);
       // $this->call(DetailsSeeder::class);
       // $this->call(GradesSeeder::class);
       
       // $this->call(CarsSeeder::class);
       // $this->call(ItemsSeeder::class);
       // $this->call(PurchasesSeeder::class);
       // $this->call(OrdersSeeder::class);

    	
		$this->call(CarsTableSeeder::class);
		$this->call(BrandsTableSeeder::class);
		$this->call(DetailsTableSeeder::class);
		$this->call(ModelsTableSeeder::class);
		$this->call(GradesTableSeeder::class);


		$this->call(UsersTableSeeder::class);
		$this->call(ApplicationVerificationTableSeeder::class);
		$this->call(BoardsTableSeeder::class);
		$this->call(CategorysTableSeeder::class);
		$this->call(CertificatesTableSeeder::class);
		$this->call(CodesTableSeeder::class);
		$this->call(CommentsTableSeeder::class);
		$this->call(DiagnosisDetailTableSeeder::class);
		$this->call(DiagnosisDetailItemsTableSeeder::class);
		$this->call(DiagnosisDetailsTableSeeder::class);
		$this->call(DiagnosisFilesTableSeeder::class);
		$this->call(EmailConfirmationsTableSeeder::class);
		$this->call(FilesTableSeeder::class);
		$this->call(ItemsTableSeeder::class);
		$this->call(MigrationsTableSeeder::class);
		$this->call(OpinionsTableSeeder::class);
		$this->call(OrderFeaturesTableSeeder::class);
		$this->call(OrdersTableSeeder::class);
		$this->call(PasswordResetsTableSeeder::class);
		$this->call(PermissionRoleTableSeeder::class);
		$this->call(PermissionsTableSeeder::class);
		$this->call(PointsTableSeeder::class);
		$this->call(PostsTableSeeder::class);
		$this->call(PurchasesTableSeeder::class);
		$this->call(ReservationsTableSeeder::class);
		$this->call(RolesTableSeeder::class);
		$this->call(RoleUserTableSeeder::class);
		$this->call(SessionsTableSeeder::class);
		$this->call(SettlementFeaturesTableSeeder::class);
		$this->call(SettlementsTableSeeder::class);
		$this->call(TaggingTaggedTableSeeder::class);
		$this->call(TaggingTagGroupsTableSeeder::class);
		$this->call(TaggingTagsTableSeeder::class);
		$this->call(UnsubscribeTableSeeder::class);
		$this->call(UserExtrasTableSeeder::class);
		$this->call(UserSequencesTableSeeder::class);
		$this->call(VerificationTableSeeder::class);



		$this->call(ReservationsSeeder::class);

        return;
    }

}
