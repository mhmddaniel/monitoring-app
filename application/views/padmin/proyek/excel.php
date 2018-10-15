<?php
$file_name="Rekap Detail ".date("d-m-Y").".xls";

header("Content-type: application/vnd-ms-excel.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment; filename="'.$file_name.'"');
header("Pragma: no-cache");
header("Expires: 0");
?>
<style type="text/css">
.table {
	text-align: center;
	vertical-align: middle;
}
</style>

<table border="1px solid">
	<tbody>
		<tr class="table">
			<td rowspan="3" style="width:2%">No</td>
			<td rowspan="3" style="width:15%">Uraian Kegiatan</td>
			<td rowspan="3" style="width:9%">Kredit</td>
			<td rowspan="3" style="width:9%">PPTK</td>
			<td rowspan="3" style="width:9%">Total Dana Dalam DPA</td>
			<td rowspan="3" style="width:5%">Volume</td>
			<td rowspan="3" style="width:15%">Lokasi</td>
			<td colspan="5" style="width:9%">Pelaksanaan Kegiatan</td>
			<td colspan="5" style="width:9%">Perkembangan Pelaksanaan</td>
			<td style="width:9%">Sisa Kontrak</td>
			<td style="width:9%">Sisa Anggaran (Rp.)</td>
		</tr>
		<tr class="table">
			<td rowspan="2">L/PL/PML/SW</td>
			<td rowspan="2">Kontraktor<div>Pelaksana</td>
				<td rowspan="2">Nilai Kontrak</td>
				<td colspan="2">Jangka Kontrak</td>
				<td style="width: 5%">Target %</td>
				<td style="width: 5%">Real %</td>
				<td style="width: 5%">Deviasi %</td>
				<td style="width: 5%">(Rp.)</td>
				<td style="width: 5%">(%)</td>
				<td></td>
				<td></td>
			</tr>
			<tr class="table">
				<td style="width: 15%">Awal</td>
				<td style="width: 15%">Akhir</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>2</td>
				<td>3</td>
				<td>4</td>
				<td>5</td>
				<td>6</td>
				<td>7</td>
				<td>8</td>
				<td>9</td>
				<td>10</td>
				<td>11</td>
				<td>12</td>
				<td>13</td>
				<td>14</td>
				<td>15 = (14 - 13)</td>
				<td>16</td>
				<td>17 = (16 : 5)</td>
				<td>18</td>
				<td>19 = (5 - 15)</td>
			</tr>
			<?php 
			$no=0;
			foreach ($data->result_array() as $i) : 
				$no++;
				?>
				<tr  style="text-align: left">
					<td><?php echo $no; ?></td>
					<td><?php echo $i['ph_judul']; ?></td>
					<td><?php echo $i['ph_kredit']; ?></td>
					<td><?php echo $i['user_nama']; ?></td>
					<td>
						<?php
						$kdph=$i['ph_id'];
						$sumpag=$this->m_padmin->sumpagu($kdph);
						$sumanggaran=$this->m_padmin->sumanggaran($kdph);
						$csumpag=$sumpag->row_array();
						echo "Rp ".number_format($csumpag['sumpagu']+$sumanggaran['angpagu'])."<br>";
						?>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>0</td>
					<td>0</td>
					<td><?php 
					$greal=$this->m_padmin->sum_realisasi_by_ph($kdph);
					$xsum=0; 
					foreach($greal->result_array() as $i) :
						$xsum+=$i['pb_ds_kontrak'];
					endforeach;
					echo "Rp ".number_format($xsum);

					?></td>
					<td>0</td>
					<td>0</td>
					<td><?php echo "Rp ".number_format($csumpag['sumpagu']-($xsum)); ?></td>
				</tr>

				<?php
				$anggr=$this->m_padmin->get_anggaran_by_kode_bagian($kdph); 
				foreach ($anggr->result_array() as $j) :?>
					<tr  style="text-align: left">
						<td></td>
						<td><?php echo $j['anggaran_nama']; ?></td>
						<td></td>
						<td></td>
						<td><?php echo "Rp. ".number_format($j['anggaran_pagu']); ?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php	
				endforeach;
				$gph=$this->m_padmin->get_all_proyek_ph($kdph); 
				foreach ($gph->result_array() as $key ) {
					$prd=$this->m_padmin->get_last_prd($key['proyek_id']);
					$sumreal=$this->m_padmin->sum_realisasi_proyek($key['proyek_id']);
					$peker=$this->m_padmin->get_all_pn_by_kode($key['proyek_id']);
					$gpeker=$peker->row_array();
					?>
					<tr  style="text-align: left">
						<td></td>
						<td><?php echo $key['proyek_nama']; ?></td>
						<td></td>
						<td></td>
						<td><?php echo "Rp. ".number_format($key['proyek_pagu']); ?></td>
						<td><?php echo $key['proyek_volume']." ".$key['proyek_satuan']; ?></td>
						<td><?php echo $key['koordinat_alamat']; ?></td>
						<td></td>
						<td><?php echo $gpeker['pekerja_nama_perusahaan'];?></td>

						<td><?php echo "Rp. ".number_format($key['proyek_keuangan']); ?></td>
						<td><?php echo date('d-m-Y',strtotime($key['proyek_awal_kontrak'])); ?></td>
						<td><?php echo date('d-m-Y',strtotime($key['proyek_akhir_kontrak'])); ?></td>
						<td><?php echo $prd['pb_target']; ?></td>
						<td><?php echo $prd['pb_real']; ?></td>
						<td><?php echo $prd['pb_devisi']; ?></td>
						<td><?php echo "Rp. ".number_format($sumreal['pb_ds_kontrak']); ?></td>
						<td><?php echo (($sumreal['pb_ds_kontrak'])/($key['proyek_pagu'])*100)."%"; ?></td>
						<td></td>
						<td><?php echo "Rp. ".number_format(($key['proyek_pagu'])-($sumreal['pb_ds_kontrak'])); ?></td>
					</tr>
				<?php } endforeach; ?>

			</tbody>
		</table>
