<?php

final class FinancialEngine {
    
    // les regles fixe
    private const tax = 0.10;           // 10% taxe
    private const commission = 0.05;    // 5% commission agent
    
    
    //   Calcule le coût total d'un transfert
    //   Prix + 10% taxe + 5% commission = Total
     
    public function calculateTotalCost($price) {
        return $price + ($price * self::tax) + ($price * self::commission);
        // Exemple: 100 + 10 + 5 = 115
    }
    
    
    //    Vérifie si l'équipe peut acheter
    //    true = on peut acheter
    //    false = pas assez d'argent
     
    public function canBuy($price, $budget) {
        $total = $this->calculateTotalCost($price);
        return $budget >= $total;
    }
    
    
    //   Version avec message explicatif
     
    public function checkTransfer($price, $budget) {
        $total = $this->calculateTotalCost($price);
        
        if ($budget >= $total) {
            $reste = $budget - $total;
            return " achat possible | Coût: {$total}M€ | Reste: {$reste}M€";
        } else {
            $manque = $total - $budget;
            return " impossible | Coût: {$total}M€ | Manque: {$manque}M€";
        }
    }
    
    
    //   Retourne un tableau avec tous les détails
     
    public function getTransferDetails($price, $budget) {
        $taxAmount = $price * self::tax;
        $commissionAmount = $price * self::commission;
        $total = $this->calculateTotalCost($price);
        $possible = $budget >= $total;
        
       // Calcule remaining 
        if ($possible) {
            $remaining = $budget - $total;
        } else {
            $remaining = 0;
        }
        
        return [
            'price' => $price,
            'tax' => $taxAmount,
            'commission' => $commissionAmount,
            'total' => $total,
            'budget' => $budget,
            'possible' => $possible,
            'remaining' => $remaining  
        ];
    }
}

// ===== EXEMPLE D'UTILISATION =====

// Créer l'engine
$engine = new FinancialEngine();

// Exemple 1: Simple true/false
$canBuy = $engine->canBuy(100, 150);  // 100M€ joueur, 150M€ budget
echo $canBuy ? "OUI on peut acheter\n" : "NON impossible\n";

// Exemple 2: Avec message
$result = $engine->checkTransfer(100, 150);
echo $result . "\n";
// Affiche: ✓ ACHAT POSSIBLE | Coût: 115M€ | Reste: 35M€

// Exemple 3: Détails complets en array
$details = $engine->getTransferDetails(100, 150);
echo "Prix: {$details['price']}M€\n";
echo "Taxe: {$details['tax']}M€\n";
echo "Commission: {$details['commission']}M€\n";
echo "Total: {$details['total']}M€\n";
echo "Possible: " . ($details['possible'] ? 'Oui' : 'Non') . "\n";

// Exemple 4: Cas où le budget est insuffisant
$result2 = $engine->checkTransfer(100, 50);
echo $result2 . "\n";
// Affiche: ✗ IMPOSSIBLE | Coût: 115M€ | Manque: 65M€

?>