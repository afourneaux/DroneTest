# Get all tables saved within src/Model/Table/
$Filenames = Get-ChildItem src/Model/Table/*Table.php -Name;
$GetTableNameRegex = "(.*)Table.php";
$Tables = $Filenames -replace $GetTableNameRegex, '$1'

# Bake and configure each file
foreach ($Table in $Tables) {
    bin/cake bake test controller $Table -f
    bin/cake bake test table $Table -f
    bin/cake bake fixture $Table -f
    $FixtureFilePath = 'tests/Fixture/' + $Table + 'Fixture.php'
    $FixtureFileContents = Get-Content -path $FixtureFilePath

    $inRecords = $FALSE; # Are we in the "$records" variable?
    $AIs = @();          # Flag all auto-incrementing columns for removal in sample data
    for($i = 0; $i -lt $FixtureFileContents.Count; $i++) {
        if ($FixtureFileContents[$i].contains('$this->records = [')) {
            $inRecords = $TRUE;
        }
        if (!$inRecords) {
            # Find auto-incrementing fields
            if ($FixtureFileContents[$i].contains("'autoIncrement' => true")) {
                $AIs += $FixtureFileContents[$i] -replace " *'(.*?)'.*", '$1';
            }
            #Remove any foreign key references
            if ($FixtureFileContents[$i].contains("'type' => 'foreign'")) {
                #$FixtureFileContents[$i] = '-REMOVELINE-';
            }
        }else {
            # Remove all sample data in autoincrementing rows
            foreach($AI in $AIs) {
                $GetAISubstring = "'" + $AI + "' => ";
                if ($FixtureFileContents[$i].contains($GetAISubstring)) {
                    $FixtureFileContents[$i] = '-REMOVELINE-';
                }
            }
        }
    }
    # Remove empty lines
    $FixtureFileContents = $FixtureFileContents | where {$_ -ne '-REMOVELINE-'};
    # Write to file
    $FixtureFileContents | Set-Content -Path $FixtureFilePath
}