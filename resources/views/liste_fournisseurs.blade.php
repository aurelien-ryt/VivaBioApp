<!doctype html>
<html lang="fr">
    <head>
        <meta charset='utf-8'>
        <title>VivaBio</title>
    </head>
    <body>
        <h3>Fournisseurs</h3>
        <hr/>
        
        <table>
            
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Raison sociale</th>
                    <th>Ville</th>
                </tr>
            </thead>
            
                @foreach( $fournisseurs as $unFournisseur )
                
                    <tr>
                            <td>{{ $unFournisseur->id }}</td>
                            <td>{{ $unFournisseur->raison_sociale }}</td>
                            <td>{{ $unFournisseur->ville }}</td>
                            
                    </tr>
                
                @endforeach
            
            <tbody>
            </tbody>
            
            
        </table>
        
    </body>
</html>
