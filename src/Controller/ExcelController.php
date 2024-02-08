<?php

namespace App\Controller;

use App\Service\MyFct;
use App\Model\ClientManager;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExcelController extends MyFct{
      function __construct(){
            $this->writeExcel();
      }
      // ----- Mes méthodes -----
      function writeExcel(){
            //Exportation de la table client . N   NOM   ADRESSE
            $spreadsheet=new Spreadsheet;
            $sheet=$spreadsheet->getActiveSheet();
            $sheet->setCellValue("A1","N°");
            $sheet->setCellValue("B1","NOM");
            $sheet->setCellValue("C1","ADRESSE");
            $row=2;
            $cm=new ClientManager();
            $clients=$cm->findAll();
            foreach($clients as $client){
                $numClient=$client['numClient'];
                $nomClient=$client['nomClient'];
                $adresseClient=$client['adresseClient'];
                $sheet->setCellValue("A$row",$numClient);
                $sheet->setCellValue("B$row",$nomClient);
                $sheet->setCellValue("C$row",$adresseClient);
                $row++;
            }
            $writer=new Xlsx($spreadsheet);
            $writer->save('Export table Client.xlsx');
            echo "Exportation terminée!";die;
        } 
}function writeExcel(){
        //Exportation de la table client . N   NOM   ADRESSE
        
        //$spreadsheet=new Spreadsheet;

      //   $sheet->setCellValue("A1","N°");
      //   $sheet->setCellValue("B1","NOM");
      //   $sheet->setCellValue("C1","ADRESSE");

        $spreadsheet=IOFactory::load("Public/modele-document/modele-fichier-client.xlsx");
        $sheet=$spreadsheet->getActiveSheet();

        $row=4;
        $cm=new ClientManager();
        $clients=$cm->findAll();
        $nbre=0;
        foreach($clients as $client){
            $sheet->insertNewRowBefore($row);
            $numClient=$client['numClient'];
            $nomClient=$client['nomClient'];
            $adresseClient=$client['adresseClient'];
            $sheet->setCellValue("A$row",$numClient);
            $sheet->setCellValue("B$row",$nomClient);
            $sheet->setCellValue("C$row",$adresseClient);
            $nbre++;
            $row++;
        }
        $sheet->removeRow(3);
        $writer=new Xlsx($spreadsheet);
        $writer->save('Export table Client.xlsx');
        echo "Exportation terminée!";die;
    } 